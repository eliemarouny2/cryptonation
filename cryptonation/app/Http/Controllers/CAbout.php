<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CAbout extends Controller
{
      function update_aboutus(Request $req){
   $result=DB::table('about')->where('id', 1)->update(['about'=> $req->about]);
    session(['result' => $result]);
   return redirect('/manage_aboutus');
}
}
