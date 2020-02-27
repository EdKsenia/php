<?php

if (isset($_POST["send"])) {
    $par_pos = 0;
    $text = $_POST["text"];
    $del="\n";
    $arr=explode($del,$text);
    $st = array();
    $sec = array();
    for($i=0; $i<count($arr); $i++){
        $st[$i] = explode(" ", $arr[$i]);
        shuffle($st[$i]);
//        print_r($st[$i]);
        $el = array($i => $st[$i][1]);
        $sec+= $el;
    }
    natcasesort($sec);
    for($i=0; $i<count($sec); $i++){
        print(implode(" ",$st[key($sec)]));
        print("<br/>");
        next($sec);
    }

} else {
    include "web.html";
}
?>
</body>
</html>

