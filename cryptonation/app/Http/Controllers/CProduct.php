<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CProduct extends Controller
{

    public function insert_product(Request $req){
        if($req->hasFile('image')){
        $req->validate([
            'image'=>'mimes:jpg,png,jpeg|max:5048'
        ]);
        $file=$req->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $req->image->move(public_path('images/products'),$filename);
        }

        $result= Product::insert([
        'prod_name'=>$req->name,
        'prod_price'=>$req->price,
        'prod_description'=>$req->description,
        'prod_img_url'=>$filename,
        'prod_status'=>$req->status,
        'trending'=>$req->trending,
        'fk_cat_id'=>$req->category
    ]);
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "product successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem adding product"]);
    }
   return redirect('manage_products');
    }

    function delete_product(Request $req){
    $image=Product::where('prod_id',$req->id)->first('prod_img_url');
    $result=Product::where('prod_id',$req->id)->delete();
        if($result==1){
                                if($image->prod_img_url){
    unlink(public_path('images/products/'.$image->prod_img_url));
                    }
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_products');
}

function edit_product($id){
   $product=Product::where('prod_id',$id)->first();
      $categories=Category::all();
   return view('admin/products/edit_product',[
       'product'=>$product,
       'categories'=>$categories
   ]);
}

function update_product(Request $req){
    $oldimage=Product::where('prod_id',$req->id)->first('prod_img_url');

    if($req->hasFile('image')){
        $req->validate([
            'image'=>'mimes:jpg,png,jpeg|max:5048'
        ]);
        $file=$req->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('images/products'),$filename);
        $path = public_path('images/products/'.$oldimage->prod_img_url);
         $exists = file_exists($path);
         if($exists)
            unlink($path);

    }
    
        $result=Product::where('prod_id', $req->id)
                    ->update([
                            'prod_name'=>$req->name,
                            'prod_price'=>$req->price,
                            'prod_description'=>$req->description,
                            'prod_img_url'=>(!empty($filename) ? $filename : $oldimage->prod_img_url),
                            'prod_status'=>$req->status,
                            'trending'=>$req->trending,
                            'fk_cat_id'=>$req->category
                            ]);
    if($result){
        session(['res' => 'success']);
        session(['result' => "Successfully added"]);
    }else{
        session(['res' => 'danger']);
        session(['result' => "Problem editing data"]);
    }
   return redirect('/manage_products');



}
}