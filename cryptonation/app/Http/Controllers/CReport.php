<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class CReport extends Controller
{
     function report(Request $req){
         $sales_report=Report::retrieve_report($req->start,$req->end);
    }
}
