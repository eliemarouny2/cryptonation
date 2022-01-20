<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CVariant extends Controller
{
    function insert_variant(Request $req){
        try{
        $result=Variant::insert([
    'variant_name' => $req->name
]);
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }
        }catch(Exception $ex){
    session(['res' => 'danger']);
    session(['result' => "Problem adding data"]);
        }
   return redirect('manage_variants');
}
function delete_variant(Request $req){
    $result=Variant::where('variant_id',$req->id)->delete();
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully deleted"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_variants');
 }
 function edit_variant($id){
    $data=Variant::where('variant_id',$id)->first();
    return view('admin/variants/edit_variant',[
        'variant'=>$data
    ]);
 }
 function update_variant(Request $req){
    try{
   $result=DB::table('variants')->where('variant_id', $req->id)
            ->update(['variant_name'=> $req->name]);
    if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully edited"]);
    }
    }
    catch(Exception $ex){
    session(['res' => 'danger']);
    session(['result' => "Problem editing data"]);
    }
   return redirect('/manage_variants');
}
}
