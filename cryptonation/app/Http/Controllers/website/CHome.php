<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\Vlog;
use Illuminate\Http\Request;

class CHome extends Controller
{
    public function homepage(){
        $trendings=Product::where('trending',1)->where('prod_status',1)->get();
        $blogs=Blog::where('blog_status',1)->get();
        $vlogs=Vlog::where('vlog_status',1)->get();

        return view('home',[
            'trendings'=>$trendings,
            'blogs'=>$blogs,
            'vlogs'=>$vlogs
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

        return view('about');
    }
    public function merch(){

        return view('merch');
    }
    public function checkout(){

        return view('checkout');
    }
    public function view_product(Request $req){

        return view('product');
    }
    function add_new_subscriber(Request $req){
        $result=Subscriber::insert([
            'sub_email'=>$req->email,
            'sub_status'=>1
        ]);
        return $result;
    }
}
