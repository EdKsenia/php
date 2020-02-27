<?php

if (isset($_POST["send"])) {
    $par_pos = 0;
    $text = (string) $_POST["text"];
    $pos = 0;
    $arr = array(0);
//    function changeText($text){
//        $changes = 0;
//        for ($i=0; $i<strlen($text); ++$i){
//            switch ($text[$i]){
//                case "h":
//                    $text[$i] = 4;
//                    $changes++;
//                    break;
//                case "i":
//                    $text[$i] = 1;
//                    $changes++;
//                    break;
//                case "e":
//                    $text[$i] = 3;
//                    $changes++;
//                    break;
//                case "o":
//                    $text[$i] = 0;
//                    $changes++;
//                    break;
//            }
//        }
//        return [$text, $changes];
//    }
//    print("New text: ");
//    print (changeText($text)[0]);
//    print(" and number of changes: ");
//    print(changeText($text)[1]);
    function changeText($text){
        for ($i=0; $i<strlen($text); ++$i){
            yield $text[$i];
        }
        return $text;
    }
    $changes = 0;
    print("New text: ");
    $gen = changeText($text);
    foreach ($gen as $item){
        switch ($item){
            case "h":
                echo(4);
                $changes++;
                break;
            case "i":
                echo(1);
                $changes++;
                break;
            case "e":
                echo(3);
                $changes++;
                break;
            case "o":
                echo(0);
                $changes++;
                break;
            default:
                echo($item);
                break;
        }
    }
    echo "return = ".$gen->getReturn();
//    print(" and number of changes: ");
//    print($changes);

} else {
    include "web.html";
}
?>
</body>
</html>

