<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;

class CBlog extends Controller
{
       public function insert_blog(Request $req){
        if($req->hasFile('image')){
              $req->validate([
                'image'=>'mimes:jpg,png,jpeg|max:5048'
            ]);
        $file=$req->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('images/blogs'),$filename);
            
        }
    $result=Blog::insert([
        'blog_title'=>$req->title,
        'blog_description'=>$req->description,
        'blog_video_url'=>$req->url,
        'blog_status'=>$req->status,
        'blog_image_url'=>(!empty($filename) ? $filename : ''),
    ]);
        if($result==1){
    session(['res' => 'success']);
    session(['result' => "Blog successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem adding blog"]);
    }
   return redirect('manage_blogs');
    }

    function delete_blog(Request $req){
    $result=Blog::where('blog_id',$req->id)->delete();
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "blog successfully deleted"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting blog"]);
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

      $oldimage=Blog::where('blog_id',$req->id)->first('blog_image_url');

    if($req->hasFile('image')){
        $req->validate([
            'image'=>'mimes:jpg,png,jpeg|max:5048'
        ]);
        $file=$req->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('images/blogs'),$filename);
        $path = public_path('images/blogs/'.$oldimage->blog_image_url);
         $exists = file_exists($path);
         if($oldimage->blog_image_url)
         if($exists)
            unlink($path);
    }
    
        $result=Blog::where('blog_id', $req->id)
                    ->update([
                            'blog_title'=>$req->title,
                            'blog_video_url'=>$req->url,
                            'blog_description'=>$req->description,
                            'blog_image_url'=>(!empty($filename) ? $filename : $oldimage->blog_image_url),
                            'blog_status'=>$req->status,
                            ]);
    if($result){
        session(['res' => 'success']);
        session(['result' => "blog successfully added"]);
    }else{
        session(['res' => 'danger']);
        session(['result' => "Problem editing blog"]);
    }
   return redirect('/manage_blogs');


}
}
