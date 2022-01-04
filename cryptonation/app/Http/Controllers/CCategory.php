<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CCategory extends Controller
{
    function insert_category(Request $req){
        try{
        $result=Category::insert([
    'cat_name' => $req->name
]);
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }
        }catch(Exception $ex){
    session(['res' => 'danger']);
    session(['result' => "Problem adding data"]);
        }
   return redirect('manage_categories');
}

function delete_category(Request $req){
    $result=Category::where('cat_id',$req->id)->delete();
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully deleted"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_categories');
 }

function edit_category($id){
   $data=Category::where('cat_id',$id)->first();
   return view('admin/categories/edit_category',[
       'category'=>$data
   ]);
}

function update_category(Request $req){
    try{
   $result=Category::where('cat_id', $req->id)
            ->update(['cat_name'=> $req->name]);
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully edited"]);
    }
    }
    catch(Exception $ex){
    session(['res' => 'danger']);
    session(['result' => "Problem editing data"]);
    }
   return redirect('/manage_categories');
}

}
