<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class CMission extends Controller
{
   function update_mission(Request $req){
   Mission::where('id', $req->id)
            ->update(['mission'=> $req->mission]);
   return redirect('/manage_mission');
}
}
