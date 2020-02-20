<?php

if (isset($_POST["send"])) {
    $param = (string)$_POST["param"];
    $mas_par = array(0);
    for($i=0; $i<strlen($param); $i++){
        $mas_par[$i] = ord($param[$i]);
    }
    $par_pos = 0;
    $text = (string) $_POST["text"];
    $pos = 0;
    $arr = array(0);

    for ($i=0; $i<strlen($text); ++$i){
        switch ($text[$i]){
            case ">":
                $pos++;
                break;
            case "<":
                $pos--;
                break;
            case "+":
                $arr[$pos]++;
                break;
            case "-":
                $arr[$pos]--;
                break;
            case ".":
                print chr($arr[$pos]);
                break;
            case ",":
                $arr[$pos] = $mas_par[$par_pos];
                $par_pos++;
                break;
            case "[":
                if($arr[$pos]==0){
                    $check = 1;
                    while($check!=0){
                        $i++;
                        if($text[$i] == "["){
                            $check++;
                        } elseif ($text[$i] == "]"){
                            $check--;
                        }
                    }
                }
                break;
            case "]":
                if($arr[$pos]!=0){
                    $check = 1;
                    while($check!=0){
                        $i--;
                        if($text[$i] == "]"){
                            $check++;
                        } elseif ($text[$i] == "["){
                            $check--;
                        }
                    }
                }
                break;
        }
    }
//    echo ($_POST["param"]);
} else {
    include "brainfuck.html";
}
?>
</body>
</html>

