<?php 

use App\Models\language;

$words=language::select('phrase','english')->get();
$fullstring="";

$keys=array();
$values=array();
foreach($words as $word){
    array_push($keys,$word->phrase);
    array_push($values,$word->english);
}
$arr=array_combine($keys,$values);
return $arr;

   

?>