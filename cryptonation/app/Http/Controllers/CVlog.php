<?php

namespace App\Http\Controllers;
use App\Models\Vlog;
use Illuminate\Http\Request;

class CVlog extends Controller
{
        public function insert_vlog(Request $req){
            if($req->hasFile('image')){
            $req->validate([
                'image'=>'mimes:jpg,png,jpeg|max:5048'
            ]);
        $file=$req->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('images/vlogs'),$filename);
        }
    $result=Vlog::insert([
                            'vlog_title'=>$req->title,
                            'vlog_video_url'=>$req->url,
                            'vlog_description'=>$req->description,
                            'vlog_image_url'=>(!empty($filename) ? $filename : ''),
                            'vlog_status'=>$req->status,
    ]);
        if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_vlogs');
    }

function edit_vlog($id){
      $vlog=Vlog::where('vlog_id',$id)->first();
   return view('admin/vlogs/edit_vlog',[
       'vlog'=>$vlog
   ]);
}

function update_vlog(Request $req){

      $oldimage=Vlog::where('vlog_id',$req->id)->first('vlog_image_url');

    if($req->hasFile('image')){
        $req->validate([
            'image'=>'mimes:jpg,png,jpeg|max:5048'
        ]);
        $file=$req->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('images/vlogs'),$filename);
        $path = public_path('images/vlogs/'.$oldimage->vlog_image_url);
         $exists = file_exists($path);
         if($oldimage->vlog_image_url)
         if($exists)
            unlink($path);
    }
    
        $result=Vlog::where('vlog_id', $req->id)
                    ->update([
                            'vlog_title'=>$req->title,
                            'vlog_video_url'=>$req->url,
                            'vlog_description'=>$req->description,
                            'vlog_image_url'=>(!empty($filename) ? $filename : $oldimage->vlog_image_url),
                            'vlog_status'=>$req->status,
                            ]);
    if($result){
        session(['res' => 'success']);
        session(['result' => "vlog successfully edited"]);
    }else{
        session(['res' => 'danger']);
        session(['result' => "Problem editing vlog"]);
    }
   return redirect('/manage_vlogs');


}

    function delete_vlog(Request $req){
   $result= Vlog::where('vlog_id',$req->id)->delete();
       if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully deleted"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_vlogs');
}

}
