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
    $result=Blog::insert([
        'blog_name'=>$req->name,
        'blog_price'=>$req->price,
        'blog_description'=>$req->description,
        'blog_status'=>$status,
        'fk_cat_id'=>$req->category
    ]);
        if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem adding data"]);
    }
   return redirect('manage_products');
    }
}
