<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $name
 * @property string $preview_description
 * @property string $image
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article wherePreviewDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_category
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereIsActive($value)
 * @property string|null $slug
 * @property int|null $parent_category_id
 * @property int|null $lft
 * @property int|null $rgt
 * @property int|null $depth
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node limitDepth($limit)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Eloquent\Builder|\Baum\Node withoutSelf()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category disabled()
 * @property-read string $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read string $url
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Color
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Color whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Color whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Color extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Conversation
 *
 * @property int $id
 * @property int $user1_id
 * @property int $user2_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation forUser($user_id)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereUser1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Conversation whereUser2Id($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
 */
	class Conversation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Delivery
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop[] $shops
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 */
	class Delivery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeliveryShop
 *
 * @property int $id
 * @property int $shop_id
 * @property int $delivery_id
 * @property float $price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DeliveryShop whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Delivery $delivery
 */
	class DeliveryShop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $text
 * @property int $conversation_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property string|null $file
 * @property string|null $filename
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUserId($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property array $photos
 * @property string $name
 * @property string $description
 * @property string $composition
 * @property float $price
 * @property float $sale_price
 * @property int|null $qty
 * @property int $shop_id
 * @property int $category_id
 * @property int $term_dispatch_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Delivery[] $deliveries
 * @property-read \App\Models\Shop $shop
 * @property-read \App\Models\TermDispatch $termDispatch
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereComposition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTermDispatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $address
 * @property int $viewed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereViewed($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Color[] $colors
 * @property int $is_checked
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product checked()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereIsChecked($value)
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product active()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $perms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereValue($value)
 * @mixin \Eloquent
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereName($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shop
 *
 * @property int $id
 * @property string $name
 * @property string $description_preview
 * @property string $logo
 * @property string $cover
 * @property string $city
 * @property string|null $description
 * @property string|null $return_conditions
 * @property string $master_logo
 * @property string $master_name
 * @property string $master_phone
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Delivery[] $deliveries
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereDescriptionPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereMasterLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereMasterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereMasterPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereReturnConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereAddress($value)
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property int $is_user_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsUserActive($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 */
	class Shop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slide
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereUrl($value)
 * @mixin \Eloquent
 */
	class Slide extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TermDispatch
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TermDispatch whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class TermDispatch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User withRole($role)
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string $email
 * @property string $password
 * @property int $is_activate
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsActivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @property string|null $activation_hash
 * @property-read mixed $activate_link
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereActivationHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User activated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User unactivated()
 * @property string|null $username
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @property-read \App\Models\UserSocialAccount $account
 * @property-read \App\Models\Shop $shop
 * @property-read string $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $favorite
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $index
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhone($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserSocialAccount
 *
 * @property int $id
 * @property string $provider_user_id
 * @property string $provider
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
	class UserSocialAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vacancy
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $preview_description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy wherePreviewDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Vacancy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Vacancy extends \Eloquent {}
}

