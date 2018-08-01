<?php
namespace App\Repositories;

use App\AttributeTerm;
use App\BlogArticle;
use App\BlogCategory;
use App\ClientActivity;
use App\Item;
use App\ItemAttribute;
use App\ItemCategory;
use App\ItemCharacteristic;
use App\NpCities;
use App\NpWarehouses;
use App\Order;
use App\Review;
use App\User;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(NpCitiesRepositoryInterface::class, function($app) {
            return new NpCitiesModel(new NpCities());
        });
        $this->app->bind(NpWarehousesRepositoryInterface::class, function($app) {
            return new NpWarehousesModel(new NpWarehouses());
        });

        $this->app->bind(ItemsRepositoryInterface::class, function($app) {
            return new ItemsModel(new Item());
        });
        $this->app->bind(ItemsRepositoryInterface::class, function($app) {
            return new ItemsModel(new Item());
        });
        $this->app->bind(ItemCategoriesRepositoryInterface::class, function($app) {
            return new ItemCategoriesModel(new ItemCategory());
        });
        $this->app->bind(ItemAttributesRepositoryInterface::class, function($app) {
            return new ItemAttributesModel(new ItemAttribute());
        });
        $this->app->bind(AttributeTermsRepositoryInterface::class, function($app) {
            return new AttributeTermsModel(new AttributeTerm());
        });
        $this->app->bind(ItemCharacteristicsRepositoryInterface::class, function($app) {
            return new ItemCharacteristicsModel(new ItemCharacteristic());
        });


        $this->app->bind(ReviewsRepositoryInterface::class, function($app) {
            return new ReviewsModel(new Review());
        });


        $this->app->bind(OrdersRepositoryInterface::class, function($app) {
            return new OrdersModel(new Order());
        });


        $this->app->bind(UsersRepositoryInterface::class, function($app) {
            return new UsersModel(new User());
        });


        $this->app->bind(BlogCategoriesRepositoryInterface::class, function($app) {
            return new BlogCategoriesModel(new BlogCategory());
        });
        $this->app->bind(BlogArticlesRepositoryInterface::class, function($app) {
            return new BlogArticlesModel(new BlogArticle());
        });

        $this->app->bind(ClientActivityRepositoryInterface::class, function($app) {
            return new ClientActivityModel(new ClientActivity());
        });
    }

}