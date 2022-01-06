<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\language;
use Exception;

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
    function manage_language(){
        $lang = Language::first();
        $attributes = array_keys($lang->toArray());
        return view('admin/language/manage_language',[
            'languages'=>$attributes
        ]);
    }
    function insert_language(Request $req){
        $lang=$req->language;
        try{
        $result = DB::select("ALTER TABLE languages ADD "  .$lang." TEXT");
        }catch(Exception $ex){
            return back()->with('res', 'danger')->with('result',"problem adding language");
        }
            session(['res' => 'success']);
            session(['result' => "language successfully added"]);
        return redirect('manage_language');
    }
    function delete_language($lang){
        try{
        $result = DB::select("ALTER TABLE languages DROP COLUMN "  .$lang);
        }catch(Exception $ex){
            return back()->with('res', 'danger')->with('result',"problem deleting language");
        }
            session(['res' => 'success']);
            session(['result' => "language successfully deleted"]);
        return redirect('manage_language');
    }
}