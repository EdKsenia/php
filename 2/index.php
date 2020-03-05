<?php

if (isset($_POST["send"])) {
    $par_pos = 0;
    $text = (string) $_POST["text"];
    $pos = 0;
    $arr = array(0);

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
//    echo "return = ".$gen->getReturn();
    print("<br/>");
    print(" and number of changes: ");
    print($changes);

} else {
    include "web.html";
}
?>
</body>
</html>

