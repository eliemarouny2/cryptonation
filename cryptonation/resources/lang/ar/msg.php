
        <?php 

        use App\Models\language;
        
        $words=language::select('phrase','armenian')->get();

        $keys=array();
        $values=array();
        foreach($words as $word){
            array_push($keys,$word->phrase);
            array_push($values,$word->armenian);
        }
        $arr=array_combine($keys,$values);
        return $arr;

        ?>
                