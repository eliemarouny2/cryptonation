<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CAbout;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CBlog;
use App\Http\Controllers\CCategory;
use App\Http\Controllers\CColors;
use App\Http\Controllers\CCustomer;
use App\Http\Controllers\CImage;
use App\Http\Controllers\CMission;
use App\Http\Controllers\COrder;
use App\Http\Controllers\CProduct;
use App\Http\Controllers\CReport;
use App\Http\Controllers\CSettings;
use App\Http\Controllers\CSubscribers;
use App\Http\Controllers\CVariant;
use App\Http\Controllers\CVlog;
use App\Http\Controllers\website\CHome;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Color;
use App\Models\Customer;
use App\Models\Mission;
use App\Models\Product;
use App\Models\Roadmap;
use App\Models\Subscriber;
use App\Models\Variant;
use App\Models\Vlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['LangCheck']], function () {
    Route::get('/', [CHome::class, 'homepage']);
    // Route::get('/welcome', function () {
    //     return view('welcome');
    // });
    Route::get('/blogs', [CHome::class, 'coming_soon_blogs']);
    Route::get('/vlogs', [CHome::class, 'coming_soon_vlogs']);
    //Route::get('/blogs', [CHome::class, 'blogs']);
    // Route::get('/vlogs', [CHome::class, 'vlogs']);
    Route::get('/about', [CHome::class, 'about']);
    Route::get('/merch', [CHome::class, 'merch']);
    Route::post('/add_to_cart', [CHome::class, 'add_to_cart'])->name('add_to_cart');
    Route::post('/search', [CHome::class, 'search'])->name('search');
    Route::post('/add_to_cart2', [CHome::class, 'add_to_cart2'])->name('add_to_cart2');
    Route::post('/remove_from_cart', [CHome::class, 'remove_from_cart'])->name('remove_from_cart');
    Route::get('/delete_cart', [CHome::class, 'delete_cart'])->name('delete_cart');
    Route::get('view_product/{id}', [CHome::class, 'view_product']);
    Route::get('/lang', [CSettings::class, 'lang']);
    Route::post('/add_new_subscriber', [CHome::class, 'add_new_subscriber'])->name('add_new_subscriber');
    Route::post('/update_phrase', [CSettings::class, 'update_phrase'])->name('update_phrase');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::get('/orders', function () {
        $orders = DB::table('orders')
            ->select('*')
            ->orderBy('date', 'desc')
            ->where('customer_id', Auth::user()->id)
            ->paginate(15);
        return view('orders', [
            'orders' => $orders
        ]);
    })->middleware(['auth'])->name('orders');
    require __DIR__ . '/auth.php';
    Route::post('/', [CartController::class, 'store'])->name('cart.store');
    Route::get('single_order/{id}', [CHome::class, 'single_order'])->middleware(['auth']);
});

Route::get('/adminlogin', [AuthController::class, 'login'])->name('adminauth.login');
Route::post('/admincheck', [AuthController::class, 'check'])->name('adminauth.check');
// Route::get('/adminregister', [AuthController::class, 'register'])->name('adminauth.register');
// Route::post('/adminsave', [AuthController::class, 'save'])->name('adminauth.save');
Route::group(['middleware' => ['AuthCheck']], function () {

    Route::get('/manage_categories', function () {
        $categories = Category::select(DB::raw('cat_name,cat_id'))
            ->orderBy('cat_id')
            ->get();
        return view('admin/categories/manage_categories', [
            'categories' => $categories,
        ]);
    });
    Route::get('/add_category', function () {
        return view('admin/categories/add_category');
    });
    Route::post('/insert_category', [CCategory::class, 'insert_category']);
    Route::get('delete_category/{id}', [CCategory::class, 'delete_category']);
    Route::get('edit_category/{id}', [CCategory::class, 'edit_category']);
    Route::post('/update_category', [CCategory::class, 'update_category']);
    Route::get('/adminlogout', [AuthController::class, 'logout'])->name('adminauth.logout');
    Route::post('/update_mission', [CMission::class, 'update_mission']);
    Route::post('/update_aboutus', [CAbout::class, 'update_aboutus']);
    Route::post('/update_roadmap', [CMission::class, 'update_roadmap']);
    Route::post('/update_customer', [CCustomer::class, 'update_customer']);
    Route::get('/edit_mission', function () {
        $mission = Mission::all();
        return view('admin/mission/edit_mission', [
            'mission' => $mission,
        ]);
    });
    Route::get('/edit_aboutus', function () {
        $about = DB::table('about')->first();
        return view('admin/about/edit_aboutus', [
            'about' => $about,
        ]);
    });
    Route::get('/adminuser', function () {
        $data = Admin::where('id', '=', session('LoggedAdmin'))->first();
        return view('admin/user/view_user', [
            'data' => $data,
        ]);
    });
    Route::get('/panel', function () {
        $data = ['LoggedUserInfo' => Admin::where('id', '=', session('LoggedAdmin'))->first()];
        $orderstoday = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.cust_id')
            ->select('customers.firstname', 'customers.lastname', 'customers.email', 'orders.*')
            ->whereDate('date', today())
            ->orderBy('orders.date')
            ->get();
        $customerstoday = Customer::whereDate('created_at', today())->get('email');
        $customerscount = DB::table('customers')->count();
        $productscount = DB::table('products')->count();
        $ordercounttoday = DB::table('orders')->whereDate('date', today())->count();
        $orderscount = DB::table('orders')->count();

        return view('admin/dashboard', [
            'data' => $data,
            'orders' => $orderstoday,
            'customers' => $customerstoday,
            'customerscount' => $customerscount,
            'productscount' => $productscount,
            'ordercounttoday' => $ordercounttoday,
            'orderscount' => $orderscount
        ]);
    });

    Route::get('/edit_password', function () {
        return view('admin/user/edit_password');
    });
    Route::get('edit_admin', function () {
        $data = Admin::where('id', '=', session('LoggedAdmin'))->first();
        return view('admin/user/edit_user', $data);
    });
    Route::get('/manage_colors', function () {
        $colors = Color::select(DB::raw('*'))
            ->orderBy('color_id')
            ->get();
        return view('admin/colors/manage_colors', [
            'colors' => $colors,
        ]);
    });
    Route::get('/manage_variants', function () {
        $variants = Variant::select(DB::raw('variant_name,variant_id'))
            ->orderBy('variant_id')
            ->get();
        return view('admin/variants/manage_variants', [
            'variants' => $variants,
        ]);
    });
    Route::get('/sales_reports', function () {

        return view('admin/reports/sales_report');
    });
    Route::get('/pending_orders', function () {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.cust_id')
            ->select('customers.firstname', 'customers.lastname', 'orders.*')
            ->orderBy('orders.date', 'desc')
            ->where('status', 'pending')
            ->paginate(15);
        return view('admin/orders/pending_orders', [
            'orders' => $orders,
        ]);
    });
    Route::get('/successful_orders', function () {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.cust_id')
            ->select('customers.firstname', 'customers.lastname', 'orders.*')
            ->orderBy('orders.date', 'desc')
            ->where('status', 'complete')
            ->paginate(15);
        return view('admin/orders/successful_orders', [
            'orders' => $orders,
        ]);
    });

    Route::get('/add_color', function () {
        return view('admin/colors/add_color');
    });
    Route::get('/add_variant', function () {
        return view('admin/variants/add_variant');
    });
    Route::get('/add_language', function () {
        return view('admin/language/add_language');
    });
    Route::get('/add_image', function () {
        $products = Product::all();
        return view('admin/images/add_image', [
            'products' => $products,
        ]);
    });
    Route::get('/manage_images', function () {
        $images = DB::table('image_galleries')
            ->join('products', 'image_galleries.product_id', '=', 'products.prod_id')
            ->select('products.prod_name', 'image_galleries.*')
            ->get();
        return view('admin/images/manage_images', [
            'images' => $images,
        ]);
    });
    Route::get('/add_subscriber', function () {
        return view('admin/subscribers/add_subscriber');
    });
    Route::get('/write_email', function () {
        return view('admin/subscribers/write_email');
    });
    Route::get('/manage_dhl', function () {
        return view('admin/dhl_integration/manage_dhl');
    });
    Route::get('/manage_pallapay', function () {
        return view('admin/pallapay/manage_pallapay');
    });
    Route::get('/manage_aboutus', function () {
        $about = DB::table('about')->first();
        return view('admin/about/manage_aboutus', [
            'about' => $about,
        ]);
    });
    Route::post('/insert_language', [CSettings::class, 'insert_language']);
    Route::post('/insert_color', [CColors::class, 'insert_color']);
    Route::post('/insert_subscriber', [CSubscribers::class, 'insert_subscriber']);
    Route::post('/report', [CReport::class, 'report']);
    Route::get('delete_successful_order/{id}', [COrder::class, 'delete_successful_order']);
    Route::get('delete_pending_order/{id}', [COrder::class, 'delete_pending_order']);
    Route::get('complete_order/{id}', [COrder::class, 'complete_order']);
    Route::get('delete_language/{id}', [CSettings::class, 'delete_language']);
    Route::get('delete_blog/{id}', [CBlog::class, 'delete_blog']);
    Route::get('delete_image/{id}', [CImage::class, 'delete_image']);
    Route::get('view_order/{id}', [COrder::class, 'view_order']);
    Route::get('delete_color/{id}', [CColors::class, 'delete_color']);
    Route::get('delete_subscriber/{id}', [CSubscribers::class, 'delete_subscriber']);
    Route::post('/update_subscriber', [CSubscribers::class, 'update_subscriber']);
    Route::post('/update_blog', [CBlog::class, 'update_blog']);
    Route::post('/update_adminpassword', [AuthController::class, 'update_password']);
    Route::post('/update_admin', [AuthController::class, 'update_admin']);
    Route::get('delete_vlog/{id}', [CVlog::class, 'delete_vlog']);
    Route::get('edit_link/{id}', [CSettings::class, 'edit_link']);
    Route::get('edit_variant/{id}', [CVariant::class, 'edit_variant']);
    Route::get('product/{id}', [CHome::class, 'view_product']);
    Route::get('edit_blog/{id}', [CBlog::class, 'edit_blog']);
    Route::post('/update_social', [CSettings::class, 'update_social']);
    Route::post('/update_variant', [CVariant::class, 'update_variant']);
    Route::post('/update_vlog', [CVlog::class, 'update_vlog']);
    Route::post('/update_video_url', [CSettings::class, 'update_video']);
    Route::get('/manage_products', function () {
        $products = DB::table('products')
            ->join('categories', 'categories.cat_id', '=', 'products.fk_cat_id')
            ->select('products.*', 'categories.*')
            ->paginate(15);
        return view('admin/products/manage_products', [
            'products' => $products,
        ]);
    });
    Route::get('/manage_blogs', function () {
        $blogs = Blog::pagina();
        return view('admin/blogs/manage_blogs', [
            'blogs' => $blogs,
        ]);
    });
    Route::get('/manage_customers', function () {
        $customers = Customer::all();
        return view('admin/customers/manage_customers', [
            'customers' => $customers,
        ]);
    });
    Route::get('/manage_subscribers', function () {
        $subscribers = Subscriber::all();
        return view('admin/subscribers/manage_subscribers', [
            'subscribers' => $subscribers,
        ]);
    });
    Route::post('/insert_customer', [CCustomer::class, 'insert_customer']);
    Route::post('/update_status', [CSettings::class, 'update_status']);
    Route::post('/insert_image', [CImage::class, 'insert_image']);
    Route::get('/add_customer', function () {
        return view('admin/customers/add_customer');
    });
    Route::get('/manage_settings', [CSettings::class, 'edit_settings']);
    Route::get('/manage_language', [CSettings::class, 'manage_language']);
    Route::get('/manage_biddings', function () {
        return view('admin/bidding/manage_biddings');
    });
    Route::get('/add_product', function () {
        $categories = Category::all();
        $variants = Variant::all();
        $colors = Color::all();
        return view('admin/products/add_product', [
            'categories' => $categories,
            'variants' => $variants,
            'colors' => $colors
        ]);
    });
    Route::post('/insert_product', [CProduct::class, 'insert_product']);
    Route::get('edit_product/{id}', [CProduct::class, 'edit_product']);
    Route::get('edit_phrases/{id}', [CSettings::class, 'edit_phrases']);
    Route::get('edit_video/{id}', [CSettings::class, 'edit_video_url']);
    Route::get('edit_image/{id}', [CImage::class, 'edit_image']);
    Route::get('edit_subscriber/{id}', [CSubscribers::class, 'edit_subscriber']);
    Route::get('edit_customer/{id}', [CCustomer::class, 'edit_customer']);
    Route::post('/update_product', [CProduct::class, 'update_product']);
    Route::post('/update_image', [CImage::class, 'update_image']);
    Route::get('delete_product/{id}', [CProduct::class, 'delete_product']);
    Route::get('delete_variant/{id}', [CVariant::class, 'delete_variant']);
    Route::get('delete_customer/{id}', [CCustomer::class, 'delete_customer']);
    Route::get('/add_blog', function () {
        return view('admin/blogs/add_blog');
    });
    Route::post('/insert_blog', [CBlog::class, 'insert_blog']);
    Route::post('/insert_variant', [CVariant::class, 'insert_variant']);
    Route::post('/insert_vlog', [CVlog::class, 'insert_vlog']);
    Route::get('/add_vlog', function () {
        return view('admin/vlogs/add_vlog');
    });
    Route::get('edit_vlog/{id}', [CVlog::class, 'edit_vlog']);
    Route::get('edit_roadmap', function () {
        $roadmaps = Roadmap::all();
        return view('admin/mission/edit_roadmap', [
            'roadmap' => $roadmaps,
        ]);
    });
    Route::get('/manage_mission', function () {
        $mission = Mission::all();
        $roadmaps = Roadmap::all();
        return view('admin/mission/manage_mission', [
            'mission' => $mission,
            'roadmaps' => $roadmaps,
        ]);
    });
    Route::get('/manage_vlogs', function () {
        $vlogs = Vlog::all();
        return view('admin/vlogs/manage_vlogs', [
            'vlogs' => $vlogs,
        ]);
    });
});