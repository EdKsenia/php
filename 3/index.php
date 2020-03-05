<?php

if (isset($_POST["send"])) {
    $par_pos = 0;
    $text = $_POST["text"];
    $del="\n";
    $arr=explode($del,$text);
    $st = array();
    $sec = array();
    $st_start = array();
    for($i=0; $i<count($arr); $i++){
        $st_start[$i] = explode(" ", $arr[$i]);
        $st[$i] = explode(" ", $arr[$i]);
        shuffle($st[$i]);
        $el = array();
        $mas = array();
        if(count($st[$i])>1){
            $el = array($i => $st[$i][1]);
        }
        else{
            $el = array($i => 0);
        }
        if(count($st_start[$i])>1){
            $mas = array(count($arr)+$i => $st_start[$i][1]);
        }
        else{
            $mas = array(count($arr)+$i => 0);
        }
        $sec+= $el;
        $sec+= $mas;
    }
    natcasesort($sec);
    for($i=0; $i<count($sec); $i++){
        $pos = key($sec);
        if($pos < count($sec)/2){
            print(implode(" ",$st[$pos]));
            print("<br/>");
        }
        else{
            print(implode(" ",$st_start[$pos - count($sec)/2]));
            print("<br/>");
        }
        next($sec);
    }

} else {
    include "web.html";
}
?>
</body>
</html>

