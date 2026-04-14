<?php
    function fontConection(){
        echo <<<END
        @font-face {
            /* TextGuard */
            font-family: TextGuard; /* based on Roboto by Google*/
            src: url(keyfont.ttf); 
        }
        END;
    };
    function pr_tg($val){
        $f_json = 'keyTable.json';
        $json = file_get_contents("$f_json");
        $arr= json_decode($json);
        $arrText = mb_str_split($val);
        for ($i = 0; $i < count($arrText); $i++){
            if ($arrText[$i] != " "){
                $arrText[$i] = mb_chr($arr[mb_ord($arrText[$i])], 'UTF-8'); #замена индексов UCS и перевод обратно в символ
            }
        }
        
        print(implode($arrText));
    }
    function pr_d($val){
        print(mb_ord($val));
        $f_json = 'keyTable.json';
        $json = file_get_contents("$f_json");
        $arr= json_decode($json);
        print("-");
        print($arr[mb_ord($val)]);
        print("-");
        print(mb_chr(57360));
        
    }

?>
