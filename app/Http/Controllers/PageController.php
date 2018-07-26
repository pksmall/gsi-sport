<?php

namespace App\Http\Controllers;

use App\AttributeTermsTranslation;
use App\BlogArticle;
use App\BlogArticlesTranslation;
use App\BlogCategoriesTranslation;
use App\BlogCategory;
use App\ClientActivity;
use App\ClientAddress;
use App\ClientCart;
use App\Config;
use App\FavoriteItem;
use App\GuestCart;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\OrderSuccessRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateAddressDeliveryRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Item;
use App\ItemAttribute;
use App\ItemCategoriesTranslation;
use App\ItemCategory;
use App\ItemTerms;
use App\ItemTranslation;
use App\Order;
use App\OrderItem;
use App\Repositories\ItemAttributesRepositoryInterface;
use App\Repositories\ItemCategoriesRepositoryInterface;
use App\Repositories\ItemsRepositoryInterface;
use App\Review;
use App\Role;
use App\Settings;
use App\Slide;
use App\Social;
use App\StaticPage;
use App\StaticPagesTranslation;
use App\TechnologiesCategoriesTranslation;
use App\TechnologiesCategory;
use App\TechnologiesTranslation;
use App\Technology;
use App\TypeDeliveriesTranslation;
use App\TypeDelivery;
use App\TypePay;
use App\TypePaysTranslation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Client;

/**
 * @property  config
 * @property ItemsRepositoryInterface items
 * @property  config
 * @property ItemCategoriesRepositoryInterface items_category
 * @property  config
 * @property \Illuminate\Contracts\Auth\Authenticatable|null user
 * @property ItemAttributesRepositoryInterface items_attributes
 */
class PageController extends Controller
{

    public function __construct(
        ItemsRepositoryInterface            $itemsRepository,
        ItemCategoriesRepositoryInterface   $itemCategoriesRepository,
        ItemAttributesRepositoryInterface   $itemAttributesRepository
    )
    {
        $this->items = $itemsRepository;
        $this->items_category = $itemCategoriesRepository;
        $this->items_attributes = $itemAttributesRepository;
        $this->config = Config::first();
        $this->prepare_page();
    }

    public static function prepare_page()
    {
        $parent_categories = ItemCategory::whereNull('parent_id')->orderBy('sort_order', 'asc')->get()->load('locales');

        $static_pages = StaticPagesTranslation::with('page')->where('locale', 'ru')->get();

        $footer_menu = StaticPage::where('is_footer_menu', true)->get();
        $footer_menu->load('locales');

        view()->share([
            'parent_categories' => $parent_categories,
            'static_pages' => $static_pages,
            'config' => Config::first(),
            'settings' => Settings::first(),
            'social' => Social::all(),
            'footer_menu' => $footer_menu,
        ]);
    }

    private function seo($title, $meta_title, $meta_description, $meta_keywords)
    {
        if (isset($meta_title))
        {
            $this->setTitleFront($meta_title, $title);
        } else {
            $this->setTitleFront(null, $title);
        }

        if (isset($meta_description))
        {
            $this->setDescription(strip_tags($meta_description));
        }

        if (isset($meta_keywords))
        {
            $this->setKeywords(strip_tags($meta_keywords));
        }
    }


    public function index()
    {
        $settings = Settings::first();

        if (App::getLocale() == 'ru') {
            $this->seo(isset($settings->title_shop) ? $settings->title_shop : trans('base.home'), $settings->title, $settings->description, $settings->keywords);
        }
        if (App::getLocale() == 'ua') {
            $this->seo(isset($settings->title_shop) ? $settings->title_shop : trans('base.home'), $settings->title_ua, $settings->description_ua, $settings->keywords_ua);
        }
        if (App::getLocale() == 'en') {
            $this->seo(isset($settings->title_shop) ? $settings->title_shop : trans('base.home'), $settings->title_en, $settings->description_en, $settings->keywords_en);
        }

        $slides = Slide::where('is_active', true)->get();
        $slides->load(['locales', 'slide_asset']);
        return view('front/pages/index')->with(['slides' => $slides, 'cartTotal' => $this->carttotal()]);
    }


    private function get_filter()
    {
        return  request()->session()->has('filter') ? request()->session()->get('filter') : null;
    }

    public function search(SearchRequest $request)
    {
        $search_param = $request->get('search');

        if (isset($search_param) && $search_param != null)
        {
            $items = Item::query();
            $items->whereHas('locales', function($q) use ($search_param) {
                $q->where([['name', 'like', '%' . $search_param . '%'], ['locale', 'ru']]);
            })->where('is_active', true);

            if ($items->count() < 1)
            {
                $items = Item::query();
                $items->where([['code', $search_param], ['is_active', true]]);
            }

            return view('front/pages/search')->with(['items' => $items->paginate(isset($this->config->item_limit) ? $this->config->item_limit : 10), 'cartTotal' => $this->carttotal(), 'search_param' => $search_param]);
        } else {
            return redirect()->back();
        }
    }

    public function products()
    {
        $this->setTitle(trans('base.shop'));

        $items = Item::query();
        $items = $items->where('is_active', true);
        $items->with('preview', 'locales');

        if (($filter = $this->get_filter()) != null) {
            switch ($filter) {
                case 'abc-asc':
                    $items = $items->join('item_translations', 'item_translations.item_id', '=', 'items.id')
                        ->orderBy('item_translations.name', 'asc')->select('items.*');
                    break;
                case 'abc-desc':
                    $items = $items->join('item_translations', 'item_translations.item_id', '=', 'items.id')
                        ->orderBy('item_translations.name', 'desc')->select('items.*');
                    break;
                case 'price-desc':
                    $items->orderBy('price', 'desc');
                    break;
                case 'price-acs':
                    $items->orderBy('price', 'asc');
                    break;
                default:
                    $items->orderBy('price', 'asc');
                    break;
            }
        }
        $items = $items->paginate(isset($this->config->item_limit) ? $this->config->item_limit : 10);

        //dd($items);
        $categories = array();
        foreach($items as $item) {
            if (isset($categories[$item->categories[0]->parent_id])) {
                $categories[$item->categories[0]->parent_id] += 1;
            } else {
                $categories[$item->categories[0]->parent_id] = 0;
                $categories[$item->categories[0]->parent_id] += 1;
            }
            if (isset($categories[$item->categories[0]->id])) {
                $categories[$item->categories[0]->id] += 1;
            } else {
                $categories[$item->categories[0]->id] = 0;
                $categories[$item->categories[0]->id] += 1;
            }
        }
        //dd($categories);

        $additional_menu = ItemCategory::where('is_additional_menu', true)->get();
        $additional_menu->load('locales', 'subcategories.locales', 'subcategories', 'subcategories.subcategories.locales', 'subcategories.preview');

        return view('front/pages/shop')->with(['items' => $items, 'filter' => $filter, 'cartTotal' => $this->carttotal(), 'sumitems' => $categories, 'additional_menu' => $additional_menu]);
    }


    private  function carttotal()
    {
        //if (Auth::check()) {
        //    $this->check_client_session_cart();
        //}
        $cart = $this->get_cart();
        //dd($cart);
        if (!empty($cart['cart'])) {
/*            echo "<pre>";
            print_r($cart['cart']);
            echo "</pre>";
            dd($cart['cart']); */
            if($cart['cart']->items > 0) {
                $cartTotal = $cart['cart']->total_qty;
            }
        } else {
            $cartTotal = 0;
        }

        return $cartTotal;
    }

    public function news()
    {
        $this->setTitle(trans('base.blog'));
        //App::getLocale()
        $metaPosts = BlogArticle::orderBy('id', 'DESC')->paginate(10);
        foreach ($metaPosts as $mpost) {
            $mCreatedAt[$mpost->id] = $mpost->created_at;
        }
        $posts = BlogArticlesTranslation::where('locale', 'ru')->orderBy('id', 'DESC')->paginate(10);
        foreach ($posts as $one_post) {
            $categories[] = $one_post->meta_title;
        }
        //add first views
        $posts->first()->increment('count_views');
        //dd($mCreatedAt);
        return view('front/pages/news')->with(['posts' => $posts, 'mcreated' => $mCreatedAt, 'categories' => $categories, 'cartTotal' => $this->carttotal()]);
    }

    public function item($slug)
    {
        $item = ItemTranslation::where('slug', $slug)->first();
        if (!isset($item->item))
        {
            return abort('404');
        }
        $item->item->increment('views');
        $item->item->load('characteristics', 'characteristics.parent', 'gallery');

        return view('front/pages/item')->with(['item' => $item, 'cartTotal' => $this->carttotal()]);
    }

    public function cart()
    {
        if ($this->carttotal() == 0) {
            return redirect()->route('products');
        }

        $this->setTitle(trans('base.cart'));
        $cart = $this->get_cart();
        //dd($cart);
        //return view('front/pages/guest-cart')->with(['cart' => $cart]);
        return view('front/pages/client-cart')->with(['cart' => $cart, 'cartTotal' => $this->carttotal()]);
    }

    private function check_client_session_cart()
    {
        $cart = Session::get('cart');
        if (isset($cart->items) && count($cart->items) > 0) {
            foreach ($cart->items as $item)
            {
                ClientCart::create([
                    'client_id' => Auth::user()->id,
                    'item_id' => $item['item']->id,
                    'qty' => $item['qty']
                ]);
            }
            Session::forget('cart');
        }
    }

    public function empty_cart()
    {
        $this->setTitle(trans('base.cart'));
        $cart = $this->get_cart();

        if (!empty($cart['cart']->items)){
            //dd($cart['cart']->items);
            foreach($cart['cart']->items as $item) {
                if (Auth::check()) {
                    //dd($item['item']->id);
                    $cart_item = ClientCart::where('item_id', $item['item']->id);
                    //dd($cart_item);
                    $cart_item->delete();
                }

            }
        }

        unset($cart['cart']);
        if (empty($cart['cart'])) {
            Session::forget('cart');
        }

        Session::flash('cart-update', true);

        return redirect()->route('products');
    }

    public function profile()
    {
        if (!Auth::check())
        {
            return redirect()->route('index');
        }
        $this->setTitle(trans('item.profile_title'));
        return view('front/pages/profile')->with(['user' => Auth::user(), 'cartTotal' => $this->carttotal()]);
    }

    public function profile_edit()
    {
        if (!Auth::check())
        {
            return redirect()->route('index');
        }

        $this->setTitle(trans('item.profile_title'));
        return view('front/pages/profile_edit')->with(['user' => Auth::user(), 'cartTotal' => $this->carttotal()]);
    }

    public function history()
    {
        if (!Auth::check()) {
            return redirect()->route('index');
        }

        $this->setTitle(trans('base.cart'));
        $orders = Auth::user()->orders()->paginate(10);
        return view('front/pages/client-history')->with(['orders' => $orders, 'cartTotal' => $this->carttotal()]);
    }

    public function update_profile(Request $request)
    {
        if (!Auth::check())
        {
            return redirect()->route('index');
        }
        $user = Auth::user();
        $user_data = $request->all();
        Log::info(print_r($user_data, true));

        if (($user_data['password'] != $user_data['password_confirmation'])
            && (!$user_data['password'] || !$user_data['password_confirmation'])) {
            unset($user_data['password']);
            unset($user_data['password_confirmation']);
        } else {
            $user_data['password'] = bcrypt($user_data['password']);
            $user->update($user_data);
        }

        Session::flash('profile-update', true);
        return redirect()->back();
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function static_page($slug)
    {
        $static_page = StaticPagesTranslation::with('page')->where('slug', $slug)->first();
        if (!isset($static_page))
        {
            return abort('404');
        }
        $static_page_locales = StaticPage::find($static_page->page_id)->locales;

        return view('front/pages/static')->with(['static_page' => $static_page, 'static_page_locales' => $static_page_locales, 'cartTotal' => $this->carttotal()]);
    }


    public function forgot()
    {
        $this->setTitle(trans('base.forgot'));
        view()->share('social', Social::all());
        return view('front/pages/forgot')->with(['settings' => Settings::first(), 'cartTotal' => $this->carttotal()]);
    }

    public function sign_up()
    {
        $this->setTitle(trans('base.sign_up'));
        view()->share('social', Social::all());
        return view('front/pages/sign_up')->with(['settings' => Settings::first(), 'cartTotal' => $this->carttotal()]);
    }

    public function contacts()
    {
        $static_page = StaticPagesTranslation::with('page')->where('slug', 'contacts')->first();
        $static_page_locales = StaticPage::find($static_page->page_id)->locales;
        $this->setTitle(trans($static_page_locales[0]->meta_title));
        return view('front/pages/contacts')->with(['static_page' => $static_page, 'static_page_locales' => $static_page_locales, 'cartTotal' => $this->carttotal()]);
    }

    public function about()
    {
        $static_page = StaticPagesTranslation::with('page')->where('slug', 'about')->get();
        foreach ($static_page as $one_page) {
            $categories[] = $one_page->name;
        }
        $this->setTitle(trans('base.about'));
        return view('front/pages/about')->with(['static_page' => $static_page, 'categories' => $categories, 'cartTotal' => $this->carttotal()]);
    }

    public function blog()
    {
        $this->setTitle(trans('base.blog'));
        $posts = BlogArticlesTranslation::where('locale', App::getLocale())->paginate(10);
        $posts_categories = BlogCategoriesTranslation::where('locale', App::getLocale())->get();
        return view('front/pages/blog')->with(['posts' => $posts, 'posts_categories' => $posts_categories, 'cartTotal' => $this->carttotal()]);
    }

    public function success_order(Request $request)
    {
        $this->setTitle(trans('base.blog'));

        $data = request()->session()->has('liqpay') ? request()->session()->get('liqpay') : null;
        Log::info("========== OS Start ========== ");
        Log::info($data);
        Log::info($request);
        Log::info("========== OS End ========== ");

        return view('front/pages/success-order')->with(['cartTotal' => $this->carttotal()]);
    }

    private function get_cart()
    {
        $cart = null;
        $client = null;

        // $cart = Auth::user()->cart;
        if (Auth::check()) {
            $client = Auth::user()->id;
        }

        $cart = Session::has('cart') ? Session::get('cart') : null;

        return ['cart' => $cart, 'client' => $client];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function productsCheckout()
    {
        if ($this->carttotal() == 0) {
            return redirect()->route('products');
        }

        $this->setTitle(trans('base.cart'));
        $cart = $this->get_cart();

        $this->setTitle(trans('item.checkout_title'));
        $type_delivery = TypeDeliveriesTranslation::all();
        $type_delivery->load('delivery');
        $type_pay = TypePaysTranslation::all();
        $type_pay->load('pay');
        return view('front/pages/checkout')->with(['cart' => $cart, 'cartTotal' => $this->carttotal(),'user' => Auth::user() ]);
    }


    public function liqpay_pay()
    {
        //$data = $request->all();
        $data = request()->session()->has('liqpay') ? request()->session()->get('liqpay') : null;
        app('debugbar')->disable();
        //dd($data);

        return view('front/pages/liqpay')->with(['data' => $data]);
    }
    /*    public function shop()
        {
            $items = Item::with('locales', 'preview')->where('is_active', true)->paginate(isset($this->config->item_limit) ? $this->config->item_limit : 10);

            $additional_menu = ItemCategory::where('is_additional_menu', true)->get();
            $additional_menu->load('locales', 'subcategories.locales', 'subcategories', 'subcategories.subcategories.locales', 'subcategories.preview');

            return view('front/pages/shop')->with(['items' => $items, 'filters' => $this->filter_items(), 'additional_menu' => $additional_menu]);
        }

        public function filter(Request $request)
        {
            //dd($request->all());
            $this->setTitle(trans('base.shop'));
            $items = Item::query();
            $sort = $request->get('sort');
            $qty = $request->get('qty');
            $filter = $request->get('f');
            $category = $request->get('category_id');
            $attributes = null;

            //dd($filter);

            if (isset($category) && $category != null) {
                $attributes = ItemAttribute::where('only_categories', 'like', '%'.$category.'%')->get()->toArray();
            }

            if (isset($sort) || isset($qty) || $filter) {

                if (isset($filter) && $filter != null) {
                    $items->whereHas('terms', function($q) use ($filter) {
                        $q->whereIn('term_id', $filter);
                    }, '>=', count($filter));
                }

                //dd($items->get());

                if ($sort) {
                    switch ($sort) {
                        case 'asc':
                            $items->orderBy('created_at', 'asc');
                            break;
                        case 'price_asc':
                            $items->orderBy('price', 'asc');
                            break;
                        case 'price_desc':
                            $items->orderBy('price', 'desc');
                            break;
                        case 'rating_asc':
                            $items->orderBy('price', 'asc');
                            break;
                        case 'rating_desc':
                            $items->orderBy('price', 'asc');
                            break;
                        default:
                            break;
                    }
                }

                if ($qty) {
                    $items = $items->paginate($qty)->appends('qty', $qty);

                    if (isset($filter)) {
                        foreach ($filter as $f_n) {
                            if ($f_n != null) {
                                //$items->appends('f[' . $f_n . ']', $filter[$f_n]);
                                $items->appends('f[' . $f_n . ']', $f_n);
                            }
                        }
                    }

                } else {
                    $items = $items->paginate(isset($this->config->item_limit) ? $this->config->item_limit : 10);

                    if (isset($filter)) {
                        foreach ($filter as $f_n) {
                            if ($f_n != null) {
                                //$items->appends('f[' . $f_n . ']', $filter[$f_n]);
                                $items->appends('f[' . $f_n . ']', $f_n);
                            }
                        }
                    }
                }

            } else {
                return redirect()->back();
            }

            $additional_menu = ItemCategory::where('is_additional_menu', true)->get();
            $additional_menu->load('locales', 'subcategories.locales', 'subcategories', 'subcategories.subcategories.locales', 'subcategories.preview');

            return view('front/pages/shop')->with(['items' => $items, 'filters' => $this->filter_items(), 'active_filters' => $filter, 'additional_menu' => $additional_menu, 'attributes' => $attributes, 'cat' => $category]);
        }

        public function items_category_filter(Request $request)
        {
            //dd($request->all());
            $cat_id = $request->get('category_id');
            $slug = null;

            if (isset($cat_id) && $cat_id != null) {
                $slug = ItemCategoriesTranslation::where([['category_id', $cat_id], ['locale', App::getLocale()]])->first()->slug;
            } else {
                return abort('404');
            }

            $category = ItemCategory::whereHas('locales', function($q) use ($slug) {
                $q->where('slug', $slug);
            })->first();

            if (!isset($category))
            {
                return abort('404');
            }

    //        dd($category->meta_title, $category->name, $category->meta_description, $category->meta_keywords);


            if (App::getLocale() == 'ru') {
                $this->seo($category->name, isset($category->meta_title) ? $category->meta_title : null, $category->meta_description, $category->meta_keywords);
            }
            if (App::getLocale() == 'ua') {
                $this->seo($category->name, isset($category->meta_title) ? $category->meta_title : null, $category->meta_description, $category->meta_keywords);
            }
            if (App::getLocale() == 'en') {
                $this->seo($category->name, isset($category->meta_title) ? $category->meta_title : null, $category->meta_description, $category->meta_keywords);
            }



            //$this->setTitle(trans('base.shop'));
            $items = Item::query();
            $sort = $request->get('sort');
            $qty = $request->get('qty');
            $filter = $request->get('f');
            $category = $request->get('category_id');
            $attributes = null;

            //dd($filter);

            if (isset($category) && $category != null) {
                $attributes = ItemAttribute::where('only_categories', 'like', '%'.$category.'%')->get()->toArray();
            }

            if (isset($sort) || isset($qty) || $filter) {

                if (isset($filter) && $filter != null) {
                    $items->whereHas('terms', function($q) use ($filter) {
                        $q->whereIn('term_id', $filter);
                    }, '>=', count($filter));
                }

                //dd($items->get());

                if ($sort) {
                    switch ($sort) {
                        case 'asc':
                            $items->orderBy('created_at', 'asc');
                            break;
                        case 'price_asc':
                            $items->orderBy('price', 'asc');
                            break;
                        case 'price_desc':
                            $items->orderBy('price', 'desc');
                            break;
                        case 'rating_asc':
                            $items->orderBy('price', 'asc');
                            break;
                        case 'rating_desc':
                            $items->orderBy('price', 'asc');
                            break;
                        default:
                            break;
                    }
                }

                if ($qty) {
                    $items = $items->paginate($qty)->appends('qty', $qty);

                    if (isset($filter)) {
                        foreach ($filter as $f_n) {
                            if ($f_n != null) {
                                //$items->appends('f[' . $f_n . ']', $filter[$f_n]);
                                $items->appends('f[' . $f_n . ']', $f_n);
                            }
                        }
                    }

                } else {
                    $items = $items->paginate(isset($this->config->item_limit) ? $this->config->item_limit : 10);

                    if (isset($filter)) {
                        foreach ($filter as $f_n) {
                            if ($f_n != null) {
                                //$items->appends('f[' . $f_n . ']', $filter[$f_n]);
                                $items->appends('f[' . $f_n . ']', $f_n);
                            }
                        }
                    }
                }

            } else {
                return redirect()->back();
            }

            $additional_menu = ItemCategory::where('is_additional_menu', true)->get();
            $additional_menu->load('locales', 'subcategories.locales', 'subcategories', 'subcategories.subcategories.locales', 'subcategories.preview');

            return view('front/pages/shop')->with(['items' => $items, 'filters' => $this->filter_items(), 'active_filters' => $filter, 'additional_menu' => $additional_menu, 'attributes' => $attributes, 'cat' => $category, 'category' => ItemCategory::find($category)->first()]);
        }


        public function items_category(Request $request, $slug)
        {

            $category = ItemCategory::whereHas('locales', function($q) use ($slug) {
                $q->where('slug', $slug);
            })->first();

            if (!isset($category))
            {
                return abort('404');
            }


            if (App::getLocale() == 'ru') {
                $this->seo($category->name, isset($category->meta_title) ? $category->meta_title : null, $category->meta_description, $category->meta_keywords);
            }
            if (App::getLocale() == 'ua') {
                $this->seo($category->name, isset($category->meta_title) ? $category->meta_title : null, $category->meta_description, $category->meta_keywords);
            }
            if (App::getLocale() == 'en') {
                $this->seo($category->name, isset($category->meta_title) ? $category->meta_title : null, $category->meta_description, $category->meta_keywords);
            }

            $items = $category->items()->where('is_active', true)->paginate(10);

            $attributes = ItemAttribute::where('only_categories', 'like', '%'.$category->id.'%')->get();
            $attr_sort = [];
            $attr_unsort = '';

            $ai = 0;
            foreach ($attributes as $attribute)
            {
                foreach ($attribute->only_categories as $cat)
                {
                    if ($cat == $category->id)
                    {
                        if (isset($attributes[++$ai])) {
                            $attr_unsort .= $attribute->id . ',';
                        } else {
                            $attr_unsort .= $attribute->id;
                        }
                    }
                }
            }

            $attr_sort = explode(',', $attr_unsort);

            $additional_menu = ItemCategory::where('is_additional_menu', true)->get();
            $additional_menu->load('locales', 'subcategories.locales', 'subcategories', 'subcategories.subcategories.locales', 'subcategories.preview');

            return view('front/pages/shop')->with(['category' => $category, 'items' => $items, 'filters' => $this->filter_items(), 'attributes' => $attr_sort, 'additional_menu' => $additional_menu]);
        }

        public function sale()
        {
            $this->setTitle(trans('base.sale'));
            $items = Item::with('locales')->where([['is_sale', true], ['is_active', true], ['duration_sale', '>', Carbon::now()]])->paginate(isset($this->config->item_limit) ? $this->config->item_limit : 10);

            return view('front/pages/shop')->with(['items' => $items]);
        }

        public function new_items()
        {
            $this->setTitle(trans('base.new'));
            $items = null;

            if (isset($this->config->duration_new) && $this->config->duration_new > 0)
            {
                $items = Item::with('locales')->where([['is_active', true], ['created_at', '<', Carbon::now()->addDays($this->config->duration_new)
                            ->format('Y-m-d')]])->get()->map(function ($item) {
                                return isset($item->duration_new) ? $item->where('duration_new', '<', Carbon::now()) : $item;
                });
            } else {
                $items = Item::with('locales')->where([['is_active', true], ['duration_new', '>', Carbon::now()->format('Y-m-d')]])->get();
            }

            $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
            $prePage = isset($this->config->item_limit) ? $this->config->item_limit : 10;

            $items = new \Illuminate\Pagination\LengthAwarePaginator(
                $items->forPage($currentPage, $prePage), $items->count(), $prePage, $currentPage, ['path'=>url(App::getLocale() . '/shop/items/new')]
            );

            return view('front/pages/shop')->with(['items' => $items]);
        }


        public function store_comment(StoreCommentRequest $request)
        {
            if ($request->get('comment')) {
                $comment = $request->get('comment');
                $item = $this->items->find($comment['item_id']);
                if (!isset($item))
                {
                    return abort('404');
                }
                if (!Auth::check()) {
                    $check_user = $this->checkExistUser($comment['email']);
                    if (count($check_user)) {
                        Session::flash('comment-fail', true);
                        return redirect()->back();
                    } else {

                            $create_user = User::create([
                                'name' => $comment['username'],
                                'email' => $comment['email'],
                                'telephone' => $comment['telephone'] ? $comment['telephone'] : null,
                                'ip' => \Request::ip(),
                                'password' => bcrypt(str_random(8)),
                                'status_id' => 1,
                                'is_subscribe' => false
                            ]);

                            $create_user->roles()->attach(Role::where('name', 'Клиент')->first());

                            if (isset($create_user)) {
                                Review::create([
                                    'user_id' => $create_user->id,
                                    'item_id' => $item->id,
                                    'review' => $comment['message'],
                                    'rating' => $comment['rating'],
                                    'locale' => $comment['locale'],
                                    'is_active' => false
                                ]);

                                Session::flash('comment-success', true);
                                return redirect()->back();
                            }

                    }
                } else {
                    Review::create([
                        'user_id' => Auth::user()->id,
                        'item_id' => $item->id,
                        'review' => $comment['message'],
                        'rating' => $comment['rating'],
                        'locale' => $comment['locale'],
                        'is_active' => false
                    ]);

                    Session::flash('comment-success', true);
                    return redirect()->back();
                }
            }
            return null;
        }

        private function checkExistUser($email)
        {
            return User::where('email', $email)->get();
        }

        private function filter_items()
        {
            return ItemAttribute::whereHas('terms_list', function ($query) {
                $query->where('is_active', true);
            })->with(['terms_list','terms_list.locales'])->get();
        }










        public function to_fav($id)
        {
            if(!isset($id))
            {
                return abort('404');
            }
            if(!Auth::check())
            {
                return abort('404');
            }
            $item = FavoriteItem::create([
                'client_id' => Auth::user()->id,
                'item_id' => $id
            ]);
            if ($item)
            {
                Session::flash('fav-success', true);
                return redirect()->back();
            }
        }

        public function un_fav($id)
        {
            if(!isset($id))
            {
                return abort('404');
            }
            if(!Auth::check())
            {
                return abort('404');
            }
            $item = FavoriteItem::where([['client_id', Auth::user()->id], ['item_id', $id]])->first();
            if ($item)
            {
                $item->delete();
                Session::flash('un_fav-success', true);
                return redirect()->back();
            }
        }

        public function add_to_cart(AddToCartRequest $request)
        {
            $item = Item::find($request['item_id']);
            if (!isset($item))
            {
                return abort('404');
            } else {
                if (Auth::check()) {
                    $client_cart_in = ClientCart::where('item_id', $item->id)->first();
                    if (isset($client_cart_in) && $client_cart_in->size == $request->get('size')) {
                        $client_cart_in->update([
                            'qty' => $client_cart_in->qty + $request->get('qty')
                        ]);
                    } else {
                        ClientCart::create([
                            'client_id' => Auth::user()->id,
                            'item_id' => $item->id,
                            'qty' => $request->get('qty'),
                            'size' => $request->get('size')
                        ]);
                    }
                    ClientActivity::create([
                        'user_id' => Auth::user()->id,
                        'action_id' => 5,
                        'ip' => $request->ip()
                    ]);
                } else {
                    $old_cart = Session::has('cart') ? Session::get('cart') : null;
                    $cart = new GuestCart($old_cart);
                    $cart->add_item($item, $item->id, $request->get('qty'), $request->get('size'));

                    $request->session()->put('cart', $cart);
                    //$request->session()->save();
                    ClientActivity::create([
                        'action_id' => 5,
                        'ip' => $request->ip()
                    ]);
                }
                //Session::flush();
                Session::flash('cart-success', true);
            }
            return redirect()->back();
        }

        public function delete_cart_item($id)
        {
            if (Auth::check()) {
                $cart_item = ClientCart::find($id);
                if (isset($cart_item))
                {
                    if (Auth::user()->id == $cart_item->client_id)
                    {
                        $cart_item->delete();
                        Session::flash('cart-update', true);
                        return redirect()->back();
                    }
                } else {
                    return redirect()->back();
                }
            } else {
                $cart = $this->get_cart();

                if(isset($cart['cart']->items) && $cart['cart']->items != null)
                {
                    foreach ($cart['cart']->items as $key => $guest_c_item)
                    {
                        if ($guest_c_item['item']->id == $id)
                        {
                            unset($cart['cart']->items[$key]);

                            if ($cart['cart']->items == null)
                            {
                                Session::forget('cart');
                            }

                            Session::flash('cart-update', true);
                            return redirect()->back();
                        }
                    }
                } else {
                    return redirect()->back();
                }

            }
        }

        public function update_cart(Request $request)
        {
            //dd($request->all());
            $items = null;
            if ($request->get('items')) {
                $items = $request->get('items');
                $items_upd = $request->get('items');

                if (Auth::check()) {
                    $cart_items = ClientCart::where('client_id', Auth::user()->id)->get();
                    if (isset($cart_items) && count($cart_items) > 0)
                    {
                        foreach ($cart_items as $cart_item)
                        {
                            foreach ($items as $key => $item) {
                                if ($cart_item->id == $key)
                                {
                                    if ($cart_item->qty != $item['qty']) {
                                        $cart_item->update(['qty' => $item['qty']]);
                                    }
                                }
                            }
                        }
                    } else {
                        return redirect()->back();
                    }
                } else {

                    $old_cart = Session::has('cart') ? Session::get('cart') : null;
                    if (isset($old_cart))
                    {
                        $items = $old_cart->items;
                        if (isset($items) && count($items) > 0)
                        {
                            $cart = new GuestCart(null);
                            //dd($items_upd, $old_cart);
                            foreach ($items as $item)
                            {
                                if ($item['qty'] != $items_upd[$item['item']->id]['qty']){
                                    $item['qty'] = $items_upd[$item['item']->id]['qty'];
                                }
                                $cart->add_item($item['item'], $item['item']->id, $item['qty'], $item['size']);
                            }
                            $request->session()->put('cart', $cart);
                        }
                    } else {
                        return redirect()->back();
                    }
                }

            }

            switch (App::getLocale())
            {
                case 'ru':
                    return redirect()->route('checkout_ru');
                    break;
                case 'ua':
                    return redirect()->route('checkout');
                    break;
                case 'en':
                    return redirect()->route('checkout_en');
                    break;
                default:
                    break;
            }

        }

        public function order_success(OrderSuccessRequest $request)
        {
            $cart = $this->get_cart()['cart'];

            if (!isset($cart->items) && count($cart) < 1)
            {
                if (App::getLocale() == 'ru'){
                    $route = redirect()->route('index_ru');
                } elseif(App::getLocale() == 'ua') {
                    $route = redirect()->route('index');
                } elseif(App::getLocale() == 'en') {
                    $route = redirect()->route('index_en');
                }
                return $route;
            } else {

                if (!isset($cart->items) && $cart->count() > 0) {
                    $total = 0;
                    foreach ($cart as $c) {
                        $total += isset($this->config->exchange_rate) ? intval(($c->item->price * $c->qty) * $this->config->exchange_rate) : $c->item->price * $c->qty;
                    }
                    $guest_name = $request->get('guest_name');
                    $guest_city = $request->get('guest_city');
                    $guest_email = $request->get('guest_email');
                    $guest_telephone = $request->get('guest_telephone');
                    $order = Order::create([
                        'client_id' => Auth::user()->id,
                        'status_id' => 1,
                        'total' => $total,
                        'pay_id' => $request->get('pay_id'),
                        'guest_name' => isset($guest_name) ? $guest_name : null,
                        'guest_city' => isset($guest_city) ? $guest_city : null,
                        'guest_email' => isset($guest_email) ? $guest_email : null,
                        'guest_telephone' => isset($guest_telephone) ? $guest_telephone : null,
                        'delivery_id' => $request->get('delivery_id'),
                        'mail_number' => $request->get('mail_number'),
                        'more' => $request->get('more')
                    ]);

                    if (isset(Settings::first()->email) && Settings::first()->email != null)
                    {
                        mail(Settings::first()->email, "Нове замовлення на Camo-tec", 'Ось деталі замовлення: ' . route('show_order', $order->id) . '.',
                            "From: webmaster@camo-tec.com\r\n"
                            ."X-Mailer: PHP/" . phpversion());
                    }

                    if ($order)
                    {

                        if (App::getLocale() == 'ua') {
                            mail(Auth::user()->email, "Дякуємо за замовлення на Camo-tec", 'Детально про ваше замовлення можна дізнатися в вашому акаунті.',
                                "From: webmaster@camo-tec.com\r\n"
                                ."X-Mailer: PHP/" . phpversion());
                        }

                        if (App::getLocale() == 'ru') {
                            mail(Auth::user()->email, "Спасибо за заказ на Camo-tec", 'Подробно про ваш заказ можно узнать в вашем аккаунте.',
                                "From: webmaster@camo-tec.com\r\n"
                                ."X-Mailer: PHP/" . phpversion());
                        }

                        if (App::getLocale() == 'en') {
                            mail(Auth::user()->email, "Thank you for your order at Camo-tec", 'Details about your order can be found in your account.',
                                "From: webmaster@camo-tec.com\r\n"
                                ."X-Mailer: PHP/" . phpversion());
                        }
                    }

                    foreach ($cart as $c) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'item_id' => $c->item_id,
                            'size' => $c->size
                        ]);
                    }

                    foreach ($cart as $c) {
                        $c->delete();
                    }
                } elseif (count($cart->items) > 0) {


                    $is_reg = $request->get('is_register');
                    $user = null;
                    $user_pass = str_random('8');

                    if(App::getLocale() == 'ru')
                    {
                        mail($request->get('guest_email'), "Генерация пароля на Camo-tec", 'Вот сгенерированный пароль для вашей учетной записи: ' . $user_pass . '.',
                            "From: webmaster@camo-tec.com\r\n"
                            ."X-Mailer: PHP/" . phpversion());
                    }

                    if(App::getLocale() == 'ua')
                    {
                        mail($request->get('guest_email'), "Генерація пароля на Camo-tec", 'Ось згенерований пароль для вашого профілю: ' . $user_pass . '.',
                            "From: webmaster@camo-tec.com\r\n"
                            ."X-Mailer: PHP/" . phpversion());
                    }

                    if(App::getLocale() == 'en')
                    {
                        mail($request->get('guest_email'), "Generating a password for Camo-tec", 'Here is the generated password for your account: ' . $user_pass . '.',
                            "From: webmaster@camo-tec.com\r\n"
                            ."X-Mailer: PHP/" . phpversion());
                    }

                    if (isset($is_reg) && !Auth::check())
                    {
                        $user = User::create([
                            'name' => $request->get('guest_name'),
                            'email' => strtolower($request->get('guest_email')),
                            'telephone' => $request->get('guest_telephone'),
                            'ip' => \Request::ip(),
                            'password' => bcrypt($user_pass),
                            'status_id' => 1,
                            'is_subscribe' => false
                        ]);

                        $user->roles()->attach(Role::where('name', 'Клиент')->first());

                        Auth::attempt(['email' => $user->email, 'password' => $user_pass]);

                        if (Auth::check()) {
                            $this->check_client_session_cart();
                        }
                    }





                    $total = 0;
                    foreach ($cart->items as $c) {
                        $total += $c['item']->price * $c['qty'];
                    }
                    $order = Order::create([
                        'client_id' => isset(Auth::user()->id) ? Auth::user()->id : 0,
                        'guest_name' => $request->get('guest_name'),
                        'guest_city' => $request->get('guest_city'),
                        'guest_email' => $request->get('guest_email'),
                        'guest_telephone' => $request->get('guest_telephone'),
                        'status_id' => 1,
                        'total' => isset($this->config->exchange_rate) ? intval($total * $this->config->exchange_rate) : $total,
                        'pay_id' => $request->get('pay_id'),
                        'delivery_id' => $request->get('delivery_id'),
                        'more' => $request->get('more'),
                        'mail_number' => $request->get('mail_number')
                    ]);

                    if (isset(Settings::first()->email) && Settings::first()->email != null)
                    {
                        mail(Settings::first()->email, "Нове замовлення на Camo-tec", 'Ось деталі замовлення: ' . route('show_order', $order->id) . '.',
                            "From: webmaster@camo-tec.com\r\n"
                            ."X-Mailer: PHP/" . phpversion());
                    }

                    if ($order)
                    {
                        if (App::getLocale() == 'ua') {
                            mail($order->guest_email, "Дякуємо за замовлення на Camo-tec", 'Детально про ваше замовлення можна дізнатися в вашому акаунті.',
                                "From: webmaster@camo-tec.com\r\n"
                                ."X-Mailer: PHP/" . phpversion());
                        }

                        if (App::getLocale() == 'ru') {
                            mail($order->guest_email, "Спасибо за заказ на Camo-tec", 'Подробно про ваш заказ можно узнать в вашем аккаунте.',
                                "From: webmaster@camo-tec.com\r\n"
                                ."X-Mailer: PHP/" . phpversion());
                        }

                        if (App::getLocale() == 'en') {
                            mail($order->guest_email, "Thank you for your order at Camo-tec", 'Details about your order can be found in your account.',
                                "From: webmaster@camo-tec.com\r\n"
                                ."X-Mailer: PHP/" . phpversion());
                        }
                    }

                    foreach($cart->items as $z){
                        OrderItem::create([
                                'client_id' => 0,
                                'order_id' => $order->id,
                                'item_id' => $z['item']->id,
                                'size' => $z['size']
                            ]);
                    }
                    unset($cart->items);
                    $request->session()->flush();
                }
            }

            $this->setTitle(trans('item.order_success_title'));
            return view('front/pages/order-success');
        }

        public function get_order_success()
        {

            if (App::getLocale() == 'ru'){
                $route = redirect()->route('index_ru');
            } elseif(App::getLocale() == 'ua') {
                $route = redirect()->route('index');
            } elseif(App::getLocale() == 'en') {
                $route = redirect()->route('index_en');
            }
            return $route;
        }










        public function addresses()
        {
            if (!Auth::check())
            {
                return redirect()->route('index');
            }
            $this->setTitle(trans('item.profile_aside_address'));
            return view('front/pages/client-addresses')->with(['user' => Auth::user()]);
        }

        public function update_address(UpdateAddressRequest $request)
        {
            if (!Auth::check())
            {
                return redirect()->route('index');
            }
            $request_data = $request->except('_token');
            $request_data['type_id'] = 1;
            $address = Auth::user()->address();
            if (isset($address) && $address->count() > 0)
            {
                $address->update($request_data);
            } else {
                $address->create($request_data);
            }
            Session::flash('update-address', true);
            return redirect()->back();
        }

        public function update_address_delivery(UpdateAddressDeliveryRequest $request)
        {
            if (!Auth::check())
            {
                return redirect()->route('index');
            }
            $request_data = $request->except('_token');
            $request_data['type_id'] = 2;
            $address_delivery = Auth::user()->address_delivery();
            if (isset($address_delivery) && $address_delivery->count() > 0)
            {
                $address_delivery->update([
                    'country' => $request->get('delivery_country'),
                    'region' => $request->get('delivery_region'),
                    'city' => $request->get('delivery_city'),
                    'address' => $request->get('delivery_address'),
                    'zipcode' => $request->get('delivery_zipcode'),
                    'delivery_id' => $request->get('delivery_id'),
                    'type_id' => $request_data['type_id']
                ]);
            } else {
                $address_delivery->create([
                    'country' => $request->get('delivery_country'),
                    'region' => $request->get('delivery_region'),
                    'city' => $request->get('delivery_city'),
                    'address' => $request->get('delivery_address'),
                    'zipcode' => $request->get('delivery_zipcode'),
                    'delivery_id' => $request->get('delivery_id'),
                    'type_id' => $request_data['type_id']
                ]);
            }
            Session::flash('update-address-delivery', true);
            return redirect()->back();
        }

        public function favorites()
        {
            if (!Auth::check())
            {
                return redirect()->route('index');
            }
            $favorites = Auth::user()->favorites()->paginate(10);
            $this->setTitle(trans('item.profile_aside_fav'));
            return view('front/pages/client-favorites')->with(['favorites' => $favorites]);
        }

        public function orders()
        {
            if (!Auth::check())
            {
                return redirect()->route('index');
            }
            $orders = Auth::user()->orders()->paginate(10);
            $this->setTitle(trans('item.profile_aside_orders'));
            return view('front/pages/client-orders')->with(['orders' => $orders]);
        }

        public function subscribe()
        {
            if (!Auth::check())
            {
                return redirect()->route('index');
            }
            $this->setTitle(trans('item.profile_aside_subs'));
            return view('front/pages/client-subscribe')->with(['user' => Auth::user()]);
        }

        public function update_subscribe(Request $request)
        {
            if (!Auth::check())
            {
                return redirect()->route('index');
            }
            $request_data = $request->get('is_subscribe');
            if (isset($request_data))
            {
                Auth::user()->update([
                    'is_subscribe' => $request_data
                ]);
            }
            Session::flash('subs-update', true);
            return redirect()->back();
        }



        public function blog_category($slug)
        {
            $posts_category = BlogCategoriesTranslation::where('slug', $slug)->first();
            if (!isset($posts_category))
            {
                return abort(404);
            }
            $this->setTitle($posts_category->name);

            $posts_categories = BlogCategoriesTranslation::where('locale', App::getLocale())->get();
            return view('front/pages/blog-category')->with(['posts_category' => $posts_category, 'posts_categories' => $posts_categories]);
        }

        public function post($slug)
        {
            $post = BlogArticlesTranslation::where('slug', $slug)->first();
            if (!isset($post))
            {
                return abort(404);
            }
            $this->setTitle($post->name);
            view()->share('social', Social::all());
            return view('front/pages/blog-post')->with(['post' => $post]);
        }

        public function technologies()
        {
            $this->setTitle(trans('base.technologies'));
            $technologies = Technology::where('is_active', true)->paginate(isset($this->config->item_limit) ? $this->config->item_limit : 10);
            $posts_categories = TechnologiesCategory::where('is_active', true)->get();
            return view('front/pages/technologies')->with(['posts' => $technologies, 'posts_categories' => $posts_categories]);
        }

        public function technology_category(Request $request, $slug)
        {
            $posts_category = TechnologiesCategoriesTranslation::where('slug', $slug)->first();
            if (!isset($posts_category))
            {
                return abort(404);
            }
            $this->setTitle($posts_category->name);

            if ($request->ajax())
            {
                $p_ajax = $posts_category->category->technologies;
                $new_p_ajax = [];
                foreach ($p_ajax as $ajax)
                {
                    if (App::getLocale() == 'ru') {
                        array_push($new_p_ajax, ['locale' => 'ru', 'link' => route('technology_ru', $ajax->locales[0]->slug), 'poster' => $ajax->preview->path, 'title' => $ajax->locales[0]->name, 'short_description' => $ajax->locales[0]->short_description]);
                    }
                    if (App::getLocale() == 'ua') {
                        array_push($new_p_ajax, ['locale' => 'ua', 'link' => route('technology', $ajax->locales[1]->slug), 'poster' => $ajax->preview->path, 'title' => $ajax->locales[1]->name, 'short_description' => $ajax->locales[1]->short_description]);
                    }
                    if (App::getLocale() == 'en') {
                        array_push($new_p_ajax, ['locale' => 'en', 'link' => route('technology_en', $ajax->locales[2]->slug), 'poster' => $ajax->preview->path, 'title' => $ajax->locales[2]->name, 'short_description' => $ajax->locales[2]->short_description]);
                    }
                }
                return response()->json(['posts_category' => $new_p_ajax]);
            }

            $posts_categories = TechnologiesCategory::where('is_active', true)->get();
            return view('front/pages/technology-category')->with(['posts_category' => $posts_category, 'posts_categories' => $posts_categories]);
        }

        public function technology($slug)
        {
            $post = TechnologiesTranslation::where('slug', $slug)->first();
            if (!isset($post))
            {
                return abort(404);
            }
            $this->setTitle($post->name);
            view()->share('social', Social::all());
            return view('front/pages/technology-post')->with(['post' => $post]);
        }

        public function banned()
        {

            if(Session::has('banned'))
            {
                return view('front/pages/banned');
            } else {

                if (App::getLocale() == 'ua') { return redirect()->route('index'); }
                if (App::getLocale() == 'ru') { return redirect()->route('index_ru'); }
                if (App::getLocale() == 'en') { return redirect()->route('index_en'); }
            }
        }

        public function contacts_feedback(StoreFeedbackRequest $request)
        {
            if (isset(Settings::first()->email) && Settings::first()->email != null)
            {
                mail(Settings::first()->email, "Нове повідомлення на Camo-tec", 'Ось деталі повідомлення:\n Ім\'я: ' . $request->get('name') . ',\n E-mail: ' . $request->get('email') . ',\n Повідомлення: ' . $request->get('message'),
                    "From: webmaster@camo-tec.com\r\n"
                    ."X-Mailer: PHP/" . phpversion());
                Session::flash('feedback-send', true);
                return redirect()->back();
            }
        } */
}
