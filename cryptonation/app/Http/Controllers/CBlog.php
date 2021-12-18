<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CBlog extends Controller
{
       public function insert_blog(Request $req){
        if($req->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
    Blog::insert([
        'blog_name'=>$req->name,
        'blog_price'=>$req->price,
        'blog_description'=>$req->description,
        'blog_status'=>$status,
        'fk_cat_id'=>$req->category
    ]);
   return redirect('manage_products');
    }
}
