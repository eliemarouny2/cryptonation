<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CAbout;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CBlog;
use App\Http\Controllers\CCategory;
use App\Http\Controllers\CCustomer;
use App\Http\Controllers\CImage;
use App\Http\Controllers\CMission;
use App\Http\Controllers\COrder;
use App\Http\Controllers\CProduct;
use App\Http\Controllers\CSubscribers;
use App\Http\Controllers\CVlog;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Image_gallery;
use App\Models\Mission;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\Vlog;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/', [CartController::class,'store'])->name('cart.store');





Route::get('/adminlogin', [AuthController::class,'login'])->name('adminauth.login');
Route::get('/adminregister', [AuthController::class,'register'])->name('adminauth.register');
Route::post('/adminsave', [AuthController::class,'save'])->name('adminauth.save');
Route::post('/admincheck', [AuthController::class,'check'])->name('adminauth.check');


Route::group(['middleware'=>['AuthCheck']], function(){
        Route::get('/adminlogout', [AuthController::class,'logout'])->name('adminauth.logout');
        Route::post('/update_mission', [CMission::class,'update_mission']);
        Route::post('/update_aboutus', [CAbout::class,'update_aboutus']);

        Route::post('/update_customer', [CCustomer::class,'update_customer']);
        Route::get('/edit_mission', function () {
            $mission=Mission::all();
            return view('admin/mission/edit_mission',[
                'mission'=>$mission
            ]);
        });

        Route::get('/edit_aboutus', function () {
                $about=DB::table('about')->first();
            return view('admin/about/edit_aboutus',[
                'about'=>$about
            ]);
        });
        Route::get('/adminuser', function () {
        $data = Admin::where('id','=', session('LoggedAdmin'))->first();
            return view('admin/user/view_user',[
                'data'=>$data
            ]);
        });
        Route::get('/panel', function () {
            $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
            return view('admin/dashboard',$data);
        });

        Route::get('/edit_password', function () {
            return view('admin/user/edit_password');
        });
        Route::get('edit_admin',function (){
            $data = Admin::where('id','=', session('LoggedAdmin'))->first();
            return view('admin/user/edit_user',$data);
        });


        Route::get('/manage_categories', function () {
            $categories=Category::select(DB::raw('cat_name,cat_id'))
                        ->orderBy('cat_id')
                        ->get();
            return view('admin/categories/manage_categories',[
                'categories'=>$categories
            ]);
        });
        
        Route::get('/sales_reports', function () {
          
            return view('admin/reports/sales_report');
        });
                Route::get('/manage_orders', function () {
            $orders=DB::table('orders')
                            ->join('customers','orders.customer_id','=','customers.cust_id')
                            ->select('customers.firstname','customers.lastname','orders.*')
                        ->orderBy('orders.date')
                        ->get();
            return view('admin/orders/manage_orders',[
                'orders'=>$orders
            ]);
        });
        Route::get('/add_category', function () {
            return view('admin/categories/add_category');
        });
                Route::get('/add_image', function () {
                    $products=Product::all();
            return view('admin/images/add_image',[
                'products'=>$products
            ]);
        });
        Route::get('/manage_images', function () {
            $images=DB::table('image_galleries')
                            ->join('products','image_galleries.product_id','=','products.prod_id')
                            ->select('products.prod_name','image_galleries.*')
                            ->get();
                        return view('admin/images/manage_images',[
                'images'=>$images
            ]);
        });
        Route::get('/add_subscriber', function () {
            return view('admin/subscribers/add_subscriber');
        });
        Route::get('/manage_aboutus', function () {
            $about=DB::table('about')->first();
            return view('admin/about/manage_aboutus',[
                'about'=>$about,
            ]);
        });
        Route::post('/insert_category', [CCategory::class,'insert_category']);

        Route::get('delete_order/{id}', [COrder::class,'delete_order']);
        Route::get('delete_image/{id}', [CImage::class,'delete_image']);
        Route::get('view_order/{id}', [COrder::class,'view_order']);

        Route::get('delete_category/{id}', [CCategory::class,'delete_category']);
        Route::get('delete_subscriber/{id}', [CSubscribers::class,'delete_subscriber']);
        Route::post('/update_subscriber', [CSubscribers::class,'update_subscriber']);
        Route::post('/update_adminpassword', [AuthController::class,'update_password']);
        Route::post('/update_admin', [AuthController::class,'update_admin']);



        Route::get('delete_vlog/{id}', [CVlog::class,'delete_vlog']);
        Route::get('edit_category/{id}', [CCategory::class,'edit_category']);
        Route::post('/update_category', [CCategory::class,'update_category']);
        Route::post('/update_vlog', [CVlog::class,'update_vlog']);

        Route::get('/manage_products', function () {
            $products=DB::select('select prod_id,prod_name, cat_name,prod_description,prod_status,prod_price from categories,products where cat_id=fk_cat_id'); 
            return view('admin/products/manage_products',[
                'products'=>$products,
            ]);
        });

        Route::get('/manage_blogs', function () {
            $blogs=Blog::all();
            return view('admin/blogs/manage_blogs',[
                'blogs'=>$blogs,
            ]);
        });

        Route::get('/manage_customers', function () {
            $customers=Customer::all();
            return view('admin/customers/manage_customers',[
                'customers'=>$customers,
            ]);
        });

        Route::get('/manage_subscribers', function () {
            $subscribers=Subscriber::all();
            return view('admin/subscribers/manage_subscribers',[
                'subscribers'=>$subscribers,
            ]);
        });

        Route::post('/insert_customer', [CCustomer::class,'insert_customer']);
        Route::post('/insert_image', [CImage::class,'insert_image']);


        Route::get('/add_customer', function () {
            return view('admin/customers/add_customer');
        });


        Route::get('/manage_settings', function () {
            return view('admin/settings/manage_settings');
        });

        Route::get('/manage_biddings', function () {
            return view('admin/bidding/manage_biddings');
        });


        Route::get('/add_product', function () {
            $categories=Category::all();
            return view('admin/products/add_product',[
                'categories'=>$categories
            ]);
        });
        Route::post('/insert_product', [CProduct::class,'insert_product']);

        Route::get('edit_product/{id}', [CProduct::class,'edit_product']);
        Route::get('edit_image/{id}', [CImage::class,'edit_image']);
        Route::get('edit_subscriber/{id}', [CSubscribers::class,'edit_subscriber']);

        Route::get('edit_customer/{id}', [CCustomer::class,'edit_customer']);

        Route::post('/update_product', [CProduct::class,'update_product']);
        Route::post('/update_image', [CImage::class,'update_image']);
        Route::get('delete_product/{id}', [CProduct::class,'delete_product']);
        Route::get('delete_customer/{id}', [CCustomer::class,'delete_customer']);

        Route::get('/add_blog', function () {
            return view('admin/blogs/add_blog');
        });
        Route::post('/insert_blog', [CBlog::class,'insert_blog']);
        Route::post('/insert_vlog', [CVlog::class,'insert_vlog']);


        Route::get('/add_vlog', function () {
            return view('admin/vlogs/add_vlog');
        });

        Route::get('edit_vlog/{id}', [CVlog::class,'edit_vlog']);

        Route::get('/manage_mission', function () {
            $mission=Mission::all();
            return view('admin/mission/manage_mission',[
                'mission'=>$mission
            ]);
        });

        Route::get('/manage_vlogs', function () {
            $vlogs=Vlog::all();
            return view('admin/vlogs/manage_vlogs',[
                'vlogs'=>$vlogs
            ]);
        });
});