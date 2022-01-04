<?php

namespace App\Http\Controllers;

use App\Models\Image_gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CImage extends Controller
{
    public function insert_image(Request $req){
    $req->validate([
            'image'=>'mimes:jpg,png,jpeg|max:5048'
        ]);
         $imagename=time(). '-'.$req->product . '.' .$req->image->extension();
        $req->image->move(public_path('image_gallery'),$imagename);
        $result= Image_gallery::insert([
       'product_id'=>$req->product,
       'img_url'=>$imagename
    
    ]);
            if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem adding data"]);
    }
   return redirect('manage_images');
    }
    function edit_image($id){
    $products=Product::select('prod_id', 'prod_name')
                                ->get();
   $data=DB::table('image_galleries')
                ->join('products','image_galleries.product_id','=','products.prod_id')
                ->select('image_galleries.*','products.prod_name')
                ->where('image_galleries.image_gallery_id',$id)
                ->first();
   return view('admin/images/edit_image',[
       'data'=>$data,
       'products'=>$products
   ]);
}

    function delete_image(Request $req){
    $oldimage=Image_gallery::where('image_gallery_id',$req->id)->first('img_url');
    $result=Image_gallery::where('image_gallery_id',$req->id)->delete();
        if($result==1){
                                if($oldimage->img_url){
    unlink(public_path('image_gallery/'.$oldimage->img_url));
                    }
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_images');
}
// function update_image(Request $req){
//     if($req->hasFile('image')){
//         $req->validate([
//             'image'=>'mimes:jpg,png,jpeg|max:5048'
//         ]);
//         $imagename=time(). '-'.$req->product . '.' .$req->image->extension();
//         $req->image->move(public_path('image_gallery'),$imagename);
//     }
//             if($req->status=='on'){
//             $status=1;
//         }else{
//             $status=0;
//         }
//         $oldimage=Image_gallery::where('image_gallery_id',$req->id)->first('img_url');
//         $result=Image_gallery::where('image_gallery_id', $req->id)
//             ->update([
//                     'product_id'=>$req->product,
//                     'img_url'=>(!empty($imagename) ? $imagename : $oldimage),

//             ]);
//                 if($result==1){
//                     if($oldimage->img_url){
//     unlink(public_path('image_gallery/'.$oldimage->img_url));
//                     }
//     session(['res' => 'success']);
//     session(['result' => "Successfully added"]);
//     }else{
//     session(['res' => 'danger']);
//     session(['result' => "Problem editing data"]);
//     }
//    return redirect('/manage_images');
// }

}
