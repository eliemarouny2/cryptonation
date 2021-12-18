<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CProduct extends Controller
{
    public function insert_product(Request $req){
        if($req->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
    Product::insert([
        'prod_name'=>$req->name,
        'prod_price'=>$req->price,
        'prod_description'=>$req->description,
        'prod_status'=>$status,
        'fk_cat_id'=>$req->category
    ]);
   return redirect('manage_products');
    }

    function delete_product(Request $req){
    Product::where('prod_id',$req->id)->delete();
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
 
            if($req->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
   Product::where('prod_id', $req->id)
            ->update([
                    'prod_name'=>$req->name,
                    'prod_price'=>$req->price,
                    'prod_description'=>$req->description,
                    'prod_status'=>$status,
                    'fk_cat_id'=>$req->category
            ]);
   return redirect('/manage_products');
}


}
