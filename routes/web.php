<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Config;
use App\ItemCategory;
use App\Settings;
use App\Social;
use App\StaticPage;
use App\StaticPagesTranslation;
use Illuminate\Support\Facades\Session;

Auth::routes();

Route::get('/locale', function (\Illuminate\Http\Request $request) {
    if ($request->get('language') != 'ua')
    {
        return redirect('/' . $request->get('language'));
    } else {
        return redirect('/');
    }
})->name('locale');

Route::get('/', 'PageController@index')->name('index');

$locales_arr = ['ru', 'en'];
foreach ($locales_arr as $locale)
{
    Route::group(['prefix' => $locale], function () use ($locale){
        Route::get('/', 'PageController@index')->name('index_' . $locale);
        Route::get('/shop', 'PageController@shop')->name('shop_' . $locale);
        Route::get('/shop/filter', 'PageController@filter')->name('filter_' . $locale);
        Route::get('/shop/category/{slug}', 'PageController@items_category')->name('items_category_' . $locale);
        Route::get('/shop/category/{slug}/filter', 'PageController@items_category_filter')->name('cat_filter_' . $locale);
        Route::get('/shop/{slug}', 'PageController@item')->name('item_' . $locale);

        Route::get('/shop/items/sale', 'PageController@sale')->name('sale_' . $locale);
        Route::get('/shop/items/new', 'PageController@new_items')->name('new_' . $locale);

        Route::get('/shop/items/search', 'PageController@search')->name('search_' . $locale);

        Route::get('/cart', 'PageController@cart')->name('cart_' . $locale);
        Route::post('/update_cart', 'PageController@update_cart')->name('update_cart_' . $locale);
        Route::get('/checkout', 'PageController@checkout')->name('checkout_' . $locale);
        Route::get('/order-success', 'PageController@get_order_success')->name('get_order_success_' . $locale);
        Route::post('/order-success', 'PageController@order_success')->name('order_success_' . $locale);

        Route::get('/profile', 'PageController@profile')->name('profile_' . $locale);
        Route::post('/profile/address/edit', 'PageController@update_address')->name('update_address_' . $locale);
        Route::post('/profile/address-delivery/edit', 'PageController@update_address_delivery')->name('update_address_delivery_' . $locale);
        Route::get('/profile/addresses', 'PageController@addresses')->name('addresses_' . $locale);
        Route::get('/profile/orders', 'PageController@orders')->name('my_orders_' . $locale);
        Route::get('/profile/favorites', 'PageController@favorites')->name('my_favorites_' . $locale);
        Route::get('/profile/subscribe', 'PageController@subscribe')->name('my_subscribe_' . $locale);
        Route::get('/banned', 'PageController@banned')->name('banned_' . $locale);

        Route::get('/technologies', 'PageController@technologies')->name('technologies_' . $locale);
        Route::get('/technology/{slug}', 'PageController@technology')->name('technology_' . $locale);
        Route::get('/technologies/cat/{slug}', 'PageController@technology_category')->name('technology_category_' . $locale);

        Route::get('/static/{page}', 'PageController@static_page')->name('front_static_pages_' . $locale);

        Route::get('/contacts', 'PageController@contacts')->name('contacts_' . $locale);
        Route::post('/contacts/feedback', 'PageController@contacts_feedback')->name('contacts_feedback' . $locale);

        Route::get('/about', 'PageController@about')->name('about_' . $locale);

        Route::get('/blog', 'PageController@blog')->name('blog_' . $locale);
        Route::get('/blog/{slug}', 'PageController@post')->name('post_' . $locale);
        Route::get('/blog/cat/{slug}', 'PageController@blog_category')->name('blog_category_' . $locale);


        Route::get('/login', function () {
            if (\Illuminate\Support\Facades\Auth::check())
            {
                dd(Auth0::getUser());
            }

            \App\Http\Controllers\PageController::prepare_page();

            return view('auth/login');
        })->name('login_' . $locale);

        Route::get('/register', function () {
            if (\Illuminate\Support\Facades\Auth::check())
            {
                //dd(123);
            }

            \App\Http\Controllers\PageController::prepare_page();

            return view('auth/register');
        })->name('register_' . $locale);

        Route::get('/password/reset',function () {
            if (\Illuminate\Support\Facades\Auth::check())
            {
                //dd(123);
            }

            \App\Http\Controllers\PageController::prepare_page();

            return view('auth/passwords/email');
        })->name('password.email_' . $locale);

        Route::post('/logout', 'Auth\LoginController@logout')->name('logout_' . $locale);
    });
}


Route::get('/login', function () {
    if (\Illuminate\Support\Facades\Auth::check())
    {
        dd(Auth0::getUser());
    }
    \App\Http\Controllers\PageController::prepare_page();

    return view('auth/login');
})->name('login');

Route::get('/register', function () {

    if (\Illuminate\Support\Facades\Auth::check())
    {
        //dd(123);
    }

    \App\Http\Controllers\PageController::prepare_page();

    return view('auth/register');
})->name('register');

Route::get('/password/reset',function () {
    if (\Illuminate\Support\Facades\Auth::check())
    {
        //dd(123);
    }

    \App\Http\Controllers\PageController::prepare_page();

    return view('auth/passwords/email');
})->name('password.email');

Route::get('/products', 'PageController@products')->name('products');
Route::get('/shop', 'PageController@shop')->name('shop');

Route::get('/shop/filter', 'PageController@filter')->name('filter');
Route::get('/shop/category/{slug}', 'PageController@items_category')->name('items_category');
Route::get('/shop/category/{slug}/filter', 'PageController@items_category_filter')->name('cat_filter');

Route::get('/products/{slug}', 'PageController@item')->name('item');
Route::get('/shop/{slug}', 'PageController@item')->name('item');

Route::get('/shop/items/sale', 'PageController@sale')->name('sale');
Route::get('/shop/items/new', 'PageController@new_items')->name('new');

Route::get('/shop/items/search', 'PageController@search')->name('search');

Route::get('/static/{page}', 'PageController@static_page')->name('front_static_pages');

Route::get('/contacts', 'PageController@contacts')->name('contacts');
Route::post('/contacts/feedback', 'PageController@contacts_feedback')->name('contacts_feedback');

Route::get('/technologies', 'PageController@technologies')->name('technologies');
Route::get('/technology/{slug}', 'PageController@technology')->name('technology');
Route::get('/technologies/cat/{slug}', 'PageController@technology_category')->name('technology_category');

Route::get('/about', 'PageController@about')->name('about');
Route::get('/sign_up', 'PageController@sign_up')->name('sign_up');
Route::get('/forgot', 'PageController@forgot')->name('forgot');

Route::get('/cart', 'PageController@cart')->name('cart');
Route::post('/add_to_cart', 'PageController@add_to_cart')->name('add_to_cart');
Route::post('/to_fav/{id}', 'PageController@to_fav')->name('to_fav');
Route::post('/un_fav/{id}', 'PageController@un_fav')->name('un_fav');
Route::get('/delete_cart_item/{id}', 'PageController@delete_cart_item')->name('delete_cart_item');
Route::post('/update_cart', 'PageController@update_cart')->name('update_cart');
Route::get('/checkout', 'PageController@checkout')->name('checkout');
Route::get('/order-success', 'PageController@get_order_success')->name('get_order_success');
Route::post('/order-success', 'PageController@order_success')->name('order_success');

Route::get('/profile', 'PageController@profile')->name('profile');
Route::post('/profile', 'PageController@update_profile')->name('update_profile');
Route::get('/profile/addresses', 'PageController@addresses')->name('addresses');
Route::post('/profile/address/edit', 'PageController@update_address')->name('update_address');
Route::post('/profile/address-delivery/edit', 'PageController@update_address_delivery')->name('update_address_delivery');
Route::get('/profile/favorites', 'PageController@favorites')->name('my_favorites');
Route::get('/profile/orders', 'PageController@orders')->name('my_orders');
Route::get('/profile/subscribe', 'PageController@subscribe')->name('my_subscribe');
Route::post('/profile/subscribe', 'PageController@update_subscribe')->name('update_my_subscribe');
Route::get('/banned', 'PageController@banned')->name('banned');

Route::post('/comment/new', 'PageController@store_comment')->name('store_comment');

Route::get('/blog', 'PageController@blog')->name('blog');
Route::get('/blog/{slug}', 'PageController@post')->name('post');
Route::get('/blog/cat/{slug}', 'PageController@blog_category')->name('blog_category');

Route::get('/news', 'PageController@news')->name('news');
Route::get('/news/{slug}', 'PageController@post')->name('post');
Route::get('/news/cat/{slug}', 'PageController@blog_category')->name('blog_category');

Route::get('/contactformsend', 'AjaxController@send');
Route::post('/contactformsend', 'AjaxController@send');

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {

    Route::get('/items/categories', 'AdminController@items_categories')->name('admin_items_categories');
    Route::get('/items/categories/new', 'AdminController@categories_new')->name('admin_categories_new');
    Route::post('/items/categories/new', 'AdminController@categories_store')->name('admin_categories_store');
    Route::get('/items/category/{id}', 'AdminController@items_category')->name('show_category');
    Route::get('/items/category/{id}/edit', 'AdminController@edit_items_category')->name('edit_items_category');
    Route::put('/items/category/{id}/edit', 'AdminController@update_items_category')->name('update_items_category');
    Route::delete('/items/category/{id}/destroy', 'AdminController@destroy_items_category')->name('destroy_items_category');
    Route::get('/items/category/{id}/subcategories', 'AdminController@items_category_subcategories')->name('show_category_subcategories');
    Route::get('/items/category/{id}/subcategories/new', 'AdminController@categories_new')->name('admin_subcategories_new');

    Route::get('/items', 'AdminController@items')->name('admin_items');
    Route::get('/items/new', 'AdminController@items_new')->name('admin_items_new');
    Route::post('/items/new', 'AdminController@items_store')->name('admin_items_store');
//    Route::get('/item/{id}', 'AdminController@item')->name('admin_item');
    Route::get('/item/{id}/edit', 'AdminController@item_edit')->name('edit_item');
    Route::put('/item/{id}/edit', 'AdminController@item_update')->name('update_item');
    Route::delete('/item/{id}/destroy', 'AdminController@item_destroy')->name('destroy_item');
    Route::get('/items/filter', 'AdminController@items_filter')->name('items_filter');

    Route::delete('/item/{id}/preview-destroy', 'AdminController@preview_destroy')->name('preview_destroy');
    Route::delete('/item/{id}/preview-destroy-item-cat', 'AdminController@preview_destroy_item_cat')->name('preview_destroy_item_cat');
    Route::delete('/item/{id}/poster-destroy-item-cat', 'AdminController@poster_destroy_item_cat')->name('poster_destroy_item_cat');
    Route::delete('/item/{id}/slide-destroy-item-cat', 'AdminController@slide_preview_destroy')->name('slide_preview_destroy');

    Route::delete('/item/{id}/preview-destroy-article', 'AdminController@preview_destroy_article')->name('preview_destroy_article');
    Route::delete('/item/{id}/preview-destroy-technology', 'AdminController@preview_destroy_technology')->name('preview_destroy_technology');
    Route::delete('/gallery-destroy/{id}', 'AdminController@gallery_destroy')->name('gallery_destroy');

    Route::delete('/article-gallery-destroy/{id}', 'AdminController@article_gallery_destroy')->name('article_gallery_destroy');
    Route::delete('/technology-gallery-destroy/{id}', 'AdminController@technology_gallery_destroy')->name('technology_gallery_destroy');

    Route::get('/items/attributes', 'AdminController@items_attributes')->name('admin_items_attributes');
    Route::get('/items/attributes/new', 'AdminController@attributes_new')->name('admin_attributes_new');
    Route::post('/items/attributes/new', 'AdminController@attributes_store')->name('admin_attributes_store');
    Route::get('/items/attribute/{id}/edit', 'AdminController@edit_attribute')->name('edit_attribute');
    Route::put('/items/attribute/{id}/edit', 'AdminController@update_attribute')->name('update_attribute');
    Route::delete('/items/attribute/{id}/destroy', 'AdminController@destroy_attribute')->name('destroy_attribute');

    Route::get('/items/attribute/{id}', 'AdminController@attribute_terms')->name('show_attribute');
    Route::get('/items/attribute/{id}/terms/new', 'AdminController@attribute_terms_new')->name('attribute_terms_new');
    Route::post('/items/attribute/{id}/terms/new', 'AdminController@attribute_terms_store')->name('attribute_terms_store');
    Route::get('/items/attribute/{id}/term/{term_id}', 'AdminController@attribute_term')->name('show_attribute_term');
    Route::get('/items/attribute/{id}/term/{term_id}/edit', 'AdminController@edit_term')->name('edit_attribute_term');
    Route::put('/items/attribute/{id}/term/{term_id}/edit', 'AdminController@update_term')->name('update_attribute_term');
    Route::delete('/items/attribute/{id}/term/{term_id}/destroy', 'AdminController@destroy_term')->name('destroy_attribute_term');

    Route::get('/items/characteristics', 'AdminController@items_characteristics')->name('admin_items_characteristics');
    Route::get('/items/characteristics/new', 'AdminController@characteristics_new')->name('admin_characteristics_new');
    Route::post('/items/characteristics/new', 'AdminController@characteristics_store')->name('admin_characteristics_store');
    Route::get('/items/characteristic/{id}/edit', 'AdminController@edit_characteristic')->name('edit_characteristic');
    Route::put('/items/characteristic/{id}/edit', 'AdminController@update_characteristic')->name('update_characteristic');
    Route::delete('/items/characteristic/{id}/destroy', 'AdminController@destroy_characteristic')->name('destroy_characteristic');

    Route::get('/technologies', 'AdminController@technologies')->name('admin_technologies');
    Route::get('/technologies/new', 'AdminController@technology_new')->name('technology_new');
    Route::post('/technologies/new', 'AdminController@technology_store')->name('technology_store');
    Route::get('/technologies/{id}/edit', 'AdminController@technology_edit')->name('technology_edit');
    Route::put('/technologies/{id}/edit', 'AdminController@technology_update')->name('technology_update');
    Route::delete('/technologies/{id}/destroy', 'AdminController@technology_destroy')->name('technology_destroy');

    Route::get('/technologies/categories', 'AdminController@technologies_categories')->name('admin_technologies_categories');
    Route::get('/technologies/categories/new', 'AdminController@technologies_categories_new')->name('technologies_categories_new');
    Route::post('/technologies/categories/new', 'AdminController@technologies_categories_store')->name('technologies_categories_store');
    Route::get('/technologies/categories/{id}/edit', 'AdminController@technologies_categories_edit')->name('technologies_categories_edit');
    Route::put('/technologies/categories/{id}/edit', 'AdminController@technologies_categories_update')->name('technologies_categories_update');
    Route::delete('/technologies/categories/{id}/destroy', 'AdminController@technologies_categories_destroy')->name('technologies_categories_destroy');

    Route::get('/reviews', 'AdminController@reviews')->name('reviews');
    Route::get('/reviews/new', 'AdminController@reviews_new')->name('admin_reviews_new');
    Route::post('/reviews/new', 'AdminController@reviews_store')->name('admin_reviews_store');
    Route::get('/review/{id}/edit', 'AdminController@review_edit')->name('edit_review');
    Route::put('/review/{id}/edit', 'AdminController@review_update')->name('update_review');
    Route::delete('/review/{id}/destroy', 'AdminController@review_destroy')->name('destroy_review');

    Route::get('/table-sizes', 'AdminController@table_sizes')->name('table_sizes');
    Route::get('/table-sizes/new', 'AdminController@table_sizes_new')->name('table_sizes_new');
    Route::post('/table-sizes/new', 'AdminController@table_sizes_store')->name('table_sizes_store');
    Route::get('/table-sizes/{id}/edit', 'AdminController@table_sizes_edit')->name('edit_table');
    Route::put('/table-sizes/{id}/edit', 'AdminController@table_sizes_update')->name('update_table_sizes');
    Route::delete('/table-sizes/{id}/destroy', 'AdminController@table_sizes_destroy')->name('destroy_table');

    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/orders', 'AdminController@orders')->name('orders');
    Route::get('/order/{id}', 'AdminController@order')->name('show_order');
    Route::get('/order/{id}/edit', 'AdminController@edit_order')->name('edit_order');
    Route::put('/order/{id}/edit', 'AdminController@update_order')->name('update_order');
    Route::delete('/order/{id}/delete', 'AdminController@destroy_order')->name('destroy_order');
    Route::get('/orders/filter', 'AdminController@orders_filter')->name('orders_filter');

    Route::get('/clients', 'AdminController@clients')->name('clients');
    Route::get('/client/{id}', 'AdminController@client')->name('show_client');
    Route::get('/client/{id}/edit', 'AdminController@client_edit')->name('edit_client');
    Route::post('/client/{id}/edit', 'AdminController@client_update')->name('update_client');
    Route::delete('/client/{id}/destroy', 'AdminController@client_destroy')->name('destroy_client');
    Route::get('/clients/filter', 'AdminController@clients_filter')->name('clients_filter');


    Route::get('/blog/categories', 'AdminController@blog_categories')->name('blog_categories');
    Route::get('/blog/categories/new', 'AdminController@blog_categories_new')->name('blog_categories_new');
    Route::post('/blog/categories/new', 'AdminController@blog_categories_store')->name('blog_categories_store');
    Route::get('/blog/category/{id}/edit', 'AdminController@blog_category_edit')->name('edit_blog_category');
    Route::put('/blog/category/{id}/edit', 'AdminController@blog_category_update')->name('blog_category_update');
    Route::delete('/blog/category/{id}/destroy', 'AdminController@blog_category_destroy')->name('destroy_blog_category');
    Route::get('/blog/category/{id}/subcategories', 'AdminController@blog_category_subcategories')->name('show_blog_category_subcategories');

    Route::get('/blog/articles', 'AdminController@blog_articles')->name('blog_articles');
    Route::get('/blog/articles/new', 'AdminController@blog_articles_new')->name('blog_articles_new');
    Route::post('/blog/articles/new', 'AdminController@blog_articles_store')->name('blog_articles_store');
    Route::get('/blog/article/{id}', 'AdminController@blog_article')->name('blog_article');
    Route::get('/blog/article/{id}/edit', 'AdminController@blog_article_edit')->name('edit_blog_article');
    Route::put('/blog/article/{id}/edit', 'AdminController@blog_article_update')->name('blog_article_update');
    Route::delete('/blog/article/{id}/destroy', 'AdminController@blog_article_destroy')->name('destroy_blog_article');

    Route::get('/slider', 'AdminController@slider')->name('slider');
    Route::get('/slider/new', 'AdminController@slide_new')->name('slide_new');
    Route::post('/slider/new', 'AdminController@slide_store')->name('slide_store');
    Route::get('/slider/{id}/edit', 'AdminController@edit_slide')->name('edit_slide');
    Route::put('/slider/{id}/edit', 'AdminController@update_slide')->name('update_slide');
    Route::delete('/slider/{id}/destroy', 'AdminController@destroy_slide')->name('destroy_slide');

    Route::get('/report/sales', 'AdminController@report_sales')->name('report_sales');
    Route::get('/report/items-views', 'AdminController@report_items_views')->name('items_views');
    Route::get('/report/items-sales', 'AdminController@report_items_sales')->name('items_sales');

    Route::get('/static-pages', 'AdminController@static_pages')->name('static_pages');
    Route::get('/static-pages/new', 'AdminController@page_new')->name('page_new');
    Route::post('/static-pages/new', 'AdminController@page_store')->name('page_store');
    Route::get('/static-pages/page/{id}/edit', 'AdminController@page_edit')->name('edit_page');
    Route::put('/static-pages/page/{id}/edit', 'AdminController@page_update')->name('update_page');
    Route::delete('/static-pages/page/{id}/destroy', 'AdminController@page_destroy')->name('destroy_page');

    Route::get('/report/clients-activity', 'AdminController@report_clients_activity')->name('clients_activity');
    Route::get('/report/clients-orders', 'AdminController@report_clients_orders')->name('clients_orders');

    Route::get('/settings', 'AdminController@settings')->name('settings');
    Route::post('/settings', 'AdminController@settings_update')->name('settings_update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
