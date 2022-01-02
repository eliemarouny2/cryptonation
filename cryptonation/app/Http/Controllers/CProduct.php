<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CProduct extends Controller
{

    public function insert_product(Request $req){
        $req->validate([
            'image'=>'mimes:jpg,png,jpeg|max:5048'
        ]);
        $imagename=time(). '-'.$req->name . '.' .$req->image->extension();
        $req->image->move(public_path('products'),$imagename);
   $result= Product::insert([
        'prod_name'=>$req->name,
        'prod_price'=>$req->price,
        'prod_description'=>$req->description,
        'prod_img_url'=>$imagename,
        'prod_status'=>$req->status,
        'trending'=>$req->trending,
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

    function delete_product(Request $req){
    $oldimage=Product::where('prod_id',$req->id)->first('prod_img_url');
    $result=Product::where('prod_id',$req->id)->delete();
        if($result==1){
                                if($oldimage->prod_img_url){
    unlink(public_path('products/'.$oldimage->prod_img_url));
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
        $imagename=time(). '-'.$req->name . '.' .$req->image->extension();
        $res=$req->image->move(public_path('products'),$imagename);
        try{
        unlink(public_path('products/'.$oldimage->prod_img_url));
        }
        catch(Exception $ex){

        }
    }
        $result=Product::where('prod_id', $req->id)
            ->update([
                    'prod_name'=>$req->name,
                    'prod_price'=>$req->price,
                    'prod_description'=>$req->description,
                    'prod_img_url'=>(!empty($imagename) ? $imagename : $oldimage),
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
