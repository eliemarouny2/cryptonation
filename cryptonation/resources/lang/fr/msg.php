
        <?php 

        use App\Models\language;
        
        $words=language::select('phrase','french')->get();

        $keys=array();
        $values=array();
        foreach($words as $word){
            array_push($keys,$word->phrase);
            array_push($values,$word->french);
        }
        $arr=array_combine($keys,$values);
        return $arr;

        ?>
                