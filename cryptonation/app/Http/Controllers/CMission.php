<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Roadmap;
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
   function update_roadmap(Request $req){
   $result=Roadmap::where('id',1)->update([
                  'roadtext'=>$req->roadmap1
            ]);
               $result=Roadmap::where('id',2)->update([
                  'roadtext'=>$req->roadmap2
            ]);
               $result=Roadmap::where('id',3)->update([
                  'roadtext'=>$req->roadmap3
            ]);
               $result=Roadmap::where('id',4)->update([
                  'roadtext'=>$req->roadmap4
            ]);
               $result=Roadmap::where('id',5)->update([
                  'roadtext'=>$req->roadmap5
            ]);
               $result=Roadmap::where('id',6)->update([
                  'roadtext'=>$req->roadmap6
            ]);
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
