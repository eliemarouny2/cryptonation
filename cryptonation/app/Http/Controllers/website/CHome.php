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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CHome extends Controller
{
    public function homepage(){
        $trendings=Product::where('trending',1)->where('prod_status',1)->get();
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

        return view('merch');
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
}
