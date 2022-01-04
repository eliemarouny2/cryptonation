<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CSettings extends Controller
{
     function edit_settings(){
        $video_url=DB::table('video_url')->where('id',1)->first();
        return view('admin/settings/manage_settings',[
            'video'=>$video_url
        ]);
    }
    function edit_video_url(Request $req){
        $video=DB::table('video_url')->where('id',1)->first();
        return view('admin/settings/edit_video_url',[
            'video'=>$video
        ]);
    }
    public function update_video(Request $req){
    
        $result=DB::table('video_url')->where('id', 1)
                    ->update([
                            'video_url'=>$req->video_url
                            ]);
    if($result){
        session(['res' => 'success']);
        session(['result' => "video URL successfully added"]);
    }else{
        session(['res' => 'danger']);
        session(['result' => "Problem editing video URL"]);
    }
   return redirect('/manage_settings');
}
}
