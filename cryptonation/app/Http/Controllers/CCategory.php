<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CCategory extends Controller
{
    function insert_category(Request $req){
        Category::insert([
    'cat_name' => $req->name
]);
   return redirect('manage_categories');
}

function delete_category(Request $req){
    Category::where('cat_id',$req->id)->delete();
   return redirect('manage_categories');
}

function edit_category($id){
   $data=Category::where('cat_id',$id)->first();
   return view('admin/categories/edit_category',[
       'category'=>$data
   ]);
}

function update_category(Request $req){
   Category::where('cat_id', $req->id)
            ->update(['cat_name'=> $req->name]);
   return redirect('/manage_categories');
}

}
