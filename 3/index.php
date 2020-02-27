
<?php

if (isset($_POST["send"])) {
    $par_pos = 0;
    $text = $_POST["text"];
    $del="\n";
    $arr=explode($del,$text);
    $arr_st = array(0);
    $arr_sec = array();
    for($i =0; $i<count($arr); $i++){
        $arr_st[$i] = explode(" ", $arr[$i]);
        shuffle($arr_st[$i]);
//        $elem = array($i, ($arr_st[$i])[2]);
//        $arr_sec[$i] = $elem;
        print_r($arr_st[$i]);
        print ("<br/>");
        $elem = array($i => ($arr_st[$i])[1]);
        $arr_sec += $elem;
    }
    natcasesort($arr_sec);//без учета регистра

    print_r($arr_sec);
    print ("<br/>");

    for($i = 0; $i<count($arr_sec); $i++) {
        print(implode(" ", $arr_st[key($arr_sec)]));
        print ("<br/>");
        next($arr_sec);
    }



} else {
    include "web.html";
}
?>


