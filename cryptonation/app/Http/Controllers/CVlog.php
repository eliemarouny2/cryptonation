<?php

namespace App\Http\Controllers;
use App\Models\Vlog;
use Illuminate\Http\Request;

class CVlog extends Controller
{
        public function insert_vlog(Request $req){
        if($req->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
    Vlog::insert([
        'vlog_title'=>$req->title,
        'vlog_description'=>$req->description,
        'vlog_status'=>$status,
    ]);
   return redirect('manage_products');
    }

function edit_vlog($id){
      $vlog=Vlog::where('vlog_id',$id)->first();
   return view('admin/vlogs/edit_vlog',[
       'vlog'=>$vlog
   ]);
}

function update_vlog(Request $req){
 
            if($req->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
   Vlog::where('vlog_id', $req->id)
            ->update([
                    'vlog_title'=>$req->title,
                    'vlog_description'=>$req->description,
                    'vlog_video_url'=>$req->url,
                    'vlog_status'=>$status,
            ]);
   return redirect('/manage_vlogs');
}

    function delete_vlog(Request $req){
    Vlog::where('vlog_id',$req->id)->delete();
   return redirect('manage_vlogs');
}

}
