<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
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
    function delete_blog(Request $req){
    $result=Blog::where('blog_id',$req->id)->delete();
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully deleted"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_blogs');
 }

function edit_blog($id){
   $blog=Blog::where('blog_id',$id)->first();
   return view('admin/blogs/edit_blog',[
       'blog'=>$blog
   ]);
}

function update_blog(Request $req){
    try{
   $result=Blog::where('blog_id', $req->id)
            ->update(['blog_name'=> $req->blog_name]);
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully edited"]);
    }
    }
    catch(Exception $ex){
    session(['res' => 'danger']);
    session(['result' => "Problem editing data"]);
    }
   return redirect('/manage_blogs');
}
}
