<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class CSubscribers extends Controller
{
       public function insert_subscriber(Request $req){
        if($req->status=='on'){
            $status=1;
        }else{
            $status=0;
        }
   $result= Subscriber::insert([
        'sub_email'=>$req->email,
    ]);
        if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem adding data"]);
    }
   return redirect('manage_subscribers');
    }

    function delete_subscriber(Request $req){
    $result=Subscriber::where('sub_id',$req->id)->delete();
        if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully added"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem deleting data"]);
    }
   return redirect('manage_subscribers');
}

function edit_subscriber($id){
   $subscriber=Subscriber::where('sub_id',$id)->first();
   return view('admin/subscribers/edit_subscriber',[
       'subscriber'=>$subscriber
   ]);
}

function update_subscriber(Request $req){
   $result=Subscriber::where('sub_id', $req->id)
            ->update([
                    'sub_email'=>$req->email,
            ]);
                if($result==1){
    session(['res' => 'success']);
    session(['result' => "Successfully updated"]);
    }else{
    session(['res' => 'danger']);
    session(['result' => "Problem editing data"]);
    }
   return redirect('/manage_subscribers');
}
}
