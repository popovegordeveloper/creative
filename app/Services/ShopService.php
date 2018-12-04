<?php

namespace App\Services;

use App\Models\Shop;
use Illuminate\Http\UploadedFile;

class ShopService
{
    /**
     * Создание магазина
     * @param $request
     * @return Shop|\Illuminate\Database\Eloquent\Model
     */
    public function saveShop($request)
   {
       mkdir(public_path("/images/shops/$request->slug"));
       $shop_data = $request->except(['logo', 'cover', 'master_logo', 'delivery', 'delivery_cost']);
       $shop_data['logo'] = $this->saveImage($request->logo, $request->slug);
       $shop_data['cover']  = $this->saveImage($request->cover, $request->slug);
       $shop_data['master_logo']  = $this->saveImage($request->master_logo, $request->slug);
       $shop_data['user_id']  = auth()->id();
       $shop = Shop::create($shop_data);
       if ($request->has('delivery')){
           for ($i = 0; $i < count($request->delivery); $i++){
               $shop->deliveries()->attach($request->delivery[$i], ['price' => $request->delivery_cost[$i]]);
           }
       }
       return $shop;
   }

    /**
     * Сохранение изображений магазина
     * @param UploadedFile $file
     * @param string $dir_name
     * @return string
     */
    private function saveImage(UploadedFile $file, string $dir_name)
   {
       $logo = $file->getClientOriginalName();
       $file->move(public_path("/images/shops/$dir_name/"), $logo);
       return "/images/shops/$dir_name/$logo";
   }

    /**
     * ОБновление магазина
     * @param $request
     */
    public function updateShop($request)
   {
       $shop_data = $request->except(['logo', 'cover', 'master_logo', 'delivery', 'delivery_cost', 'is_user_active']);
       $shop_data['is_user_active'] = true;
       if ($request->has('logo')) {
           unlink(public_path($request->logo_exist));
           $shop_data['logo'] = $this->saveImage($request->logo, $request->slug);
       }
       if ($request->has('cover')) {
           unlink(public_path($request->cover_exist));
           $shop_data['cover'] = $this->saveImage($request->cover, $request->slug);
       }
       if ($request->has('master_logo')) {
           unlink(public_path($request->master_logo_exist));
           $shop_data['master_logo'] = $this->saveImage($request->master_logo, $request->slug);
       }
       if (!$request->has('is_user_active')) $shop_data['is_user_active'] = false;
       $shop = auth()->user()->shop;
       $shop->update($shop_data);
       if ($request->has('delivery')){
           $delivery_data = [];
           for ($i = 0; $i < count($request->delivery); $i++){
               $delivery_data[$request->delivery[$i]] = ['price' => $request->delivery_cost[$i]];
           }
           $shop->deliveries()->sync($delivery_data);
       }
       if (!$request->has('is_user_active')) $shop->products()->update(['is_active' => false]);
       else $shop->products()->update(['is_active' => true]);
   }

}
