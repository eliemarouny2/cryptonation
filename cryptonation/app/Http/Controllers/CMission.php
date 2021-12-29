<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class CMission extends Controller
{
   function update_mission(Request $req){
   $result=Mission::where('id', $req->id)
            ->update(['mission'=> $req->mission]);
                if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem adding data"]);
    }
   return redirect('/manage_mission');
}
}
