<?php

use App\Http\Controllers\CAbout;
use App\Http\Controllers\CBlog;
use App\Http\Controllers\CCategory;
use App\Http\Controllers\CCustomer;
use App\Http\Controllers\CMission;
use App\Http\Controllers\CProduct;
use App\Http\Controllers\CVlog;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Mission;
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
    return view('home');
});

Route::get('/panel', function () {
    return view('admin/dashboard');
});

Route::get('/manage_categories', function () {
    $categories=Category::select(DB::raw('cat_name,cat_id'))
                ->orderBy('cat_id')
                ->get();
    return view('admin/categories/manage_categories',[
        'categories'=>$categories
    ]);
});
Route::get('/add_category', function () {
    return view('admin/categories/add_category');
});
Route::get('/manage_aboutus', function () {
     $about=DB::table('about')->first();
    return view('admin/about/manage_aboutus',[
        'about'=>$about,
    ]);
});
Route::post('/insert_category', [CCategory::class,'insert_category']);
Route::get('delete_category/{id}', [CCategory::class,'delete_category']);
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

Route::post('/insert_customer', [CCustomer::class,'insert_customer']);


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
Route::get('edit_customer/{id}', [CCustomer::class,'edit_customer']);

Route::post('/update_product', [CProduct::class,'update_product']);
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

Route::post('/update_mission', [CMission::class,'update_mission']);
Route::post('/update_aboutus', [CAbout::class,'update_aboutus']);
Route::post('/update_customer', [CCustomer::class,'update_customer']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

