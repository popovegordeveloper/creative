<?php

namespace App\Providers;

use App\Admin\Models\Answers;
use App\Admin\Models\Articles;
use App\Admin\Models\Categories;
use App\Admin\Models\CategoriesQuestion;
use App\Admin\Models\Colors;
use App\Admin\Models\Conversations;
use App\Admin\Models\Deliveries;
use App\Admin\Models\Pages;
use App\Admin\Models\Payments;
use App\Admin\Models\ProductDeliveries;
use App\Admin\Models\Products;
use App\Admin\Models\Questions;
use App\Admin\Models\Settings;
use App\Admin\Models\ShopDeliveries;
use App\Admin\Models\Shops;
use App\Admin\Models\Slides;
use App\Admin\Models\TermDispatches;
use App\Admin\Models\Users;
use App\Admin\Models\Vacancies;
use App\Models\Answer;
use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryQuestion;
use App\Models\Color;
use App\Models\Conversation;
use App\Models\Delivery;
use App\Models\DeliveryProduct;
use App\Models\DeliveryShop;
use App\Models\Page;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Question;
use App\Models\Setting;
use App\Models\Shop;
use App\Models\Slide;
use App\Models\TermDispatch;
use App\Models\User;
use App\Models\Vacancy;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        User::class => Users::class,
        Category::class => Categories::class,
        Delivery::class => Deliveries::class,
        Shop::class => Shops::class,
        Product::class => Products::class,
        DeliveryShop::class => ShopDeliveries::class,
        TermDispatch::class => TermDispatches::class,
        Setting::class => Settings::class,
        Page::class => Pages::class,
        Vacancy::class => Vacancies::class,
        Article::class => Articles::class,
        Slide::class => Slides::class,
        Conversation::class => Conversations::class,
        Color::class => Colors::class,
        Payment::class => Payments::class,
        CategoryQuestion::class => CategoriesQuestion::class,
        Question::class => Questions::class,
        Answer::class => Answers::class,
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
