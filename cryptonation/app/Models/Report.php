<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    function retrieve_report($start,$end){
        $dateRange = "a.date BETWEEN '$start%' AND '$end%'";
    }
}
