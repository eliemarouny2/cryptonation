<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Image_gallery;
use App\Models\Product;
use App\Models\Roadmap;
use App\Models\Subscriber;
use App\Models\Mission;
use App\Models\Vlog;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CHome extends Controller
{
    public function homepage(){
        $trendings=Product::where('trending',1)->where('prod_status',1)->where('fk_cat_id',1)->get();
        $blogs=Blog::where('blog_status',1)->get();
        $vlogs=Vlog::where('vlog_status',1)->get();
        $video_url=DB::table('video_url')->where('id',1)->first();
        

        return view('home',[
            'trendings'=>$trendings,
            'blogs'=>$blogs,
            'vlogs'=>$vlogs,
            'video'=>$video_url
        ]);
    }
    public function blogs(){
        $blogs=Blog::where('blog_status',1)->get();

        return view('blogs',[
            'blogs'=>$blogs
        ]);
    }
        public function vlogs(){
        $vlogs=Vlog::where('vlog_status',1)->get();

        return view('vlogs',[
            'vlogs'=>$vlogs
        ]);
    }
    public function about(){
        $mission=Mission::where('id',1)->first();
        $roadmap=Roadmap::all();
        return view('about',[
            'missions'=>$mission,
            'roadmap'=>$roadmap
        ]);
    }
    public function merch(){
        $shirts=Product::where('fk_cat_id',1)->where('prod_status',1)->get();
        $posters=Product::where('fk_cat_id',2)->where('prod_status',1)->get();
        $caps=Product::where('fk_cat_id',3)->where('prod_status',1)->get();
        return view('merch',[
        'shirts'=>$shirts,
        'posters'=>$posters,
        'caps'=>$caps
        ]);
    }
    public function checkout(){

        return view('checkout');
    }
    public function view_product(Request $req){
           $product=Product::where('prod_id',$req->id)->first();
           $images=Image_gallery::where('product_id',$req->id)->get();
        return view('product',[
            'product'=>$product,
            'images'=>$images
        ]);
    }
    function add_new_subscriber(Request $req){
        $result=Subscriber::insert([
            'sub_email'=>$req->email,
            'sub_status'=>1
        ]);
        return $result;
    }
    function add_to_cart(Request $req){
        $product=Product::where('prod_id',$req->id)->first();
     // Cart::add(['id'=>$req->id,'name'=>$product->prod_name,'price'=>$product->prod_price,'qty'=>$req->quantity,'options'=>['variant'=>$req->variant,'color'=>$req->color]]);
       Cart::add(['id' => $req->id, 'name' => $product->prod_name, 'qty' => $req->quantity, 'price' => $product->prod_price,'weight'=>0, 'options' => ['variant' => $req->variant,'color'=>$req->color,'image_url'=>$product->prod_img_url]]);
        return $product;
    }
    function delete_cart(){
        Cart::destroy();
    }

}