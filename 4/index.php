<?php

if (isset($_POST["send"])) {
    $par_pos = 0;
    $text = $_POST["text"];
    $del = "\n";
    $arr = explode($del, $text);//массив вводимых строк
    $sum = 0;
    $data = array();
    $data2 = array();
    print("Task 1:");
    print("<br/>");
    for ($i = 0; $i < count($arr); $i++) {
        $st[$i] = explode(" ", $arr[$i]);
        $sum += (int)array_pop($st[$i]);
    }
    for ($i = 0; $i < count($arr); $i++) {
        $st[$i] = explode(" ", $arr[$i]);
        $weight = (int)array_pop($st[$i]);
        $t = implode(" ", $st[$i]);
        $probability = (float)$weight / $sum;
        $array = array('text' => $t, 'weight' => ($weight),
            'probability' => $probability);
        $array2 = array('text' => $t, 'count' => 0,
            'calculated_probability' => 0);
        array_push($data, $array);
        array_push($data2, $array2);
    }
    $json = ['sum' => $sum, 'data' => $data];
    print_r(json_encode($json, JSON_UNESCAPED_UNICODE));
    print("<br/>");
    print("<br/>");
    print("Task 2:");
    print("<br/>");



    function ran($sum, $data){
        for ($i = 0; $i < 10000; $i++) {
            $j = mt_rand($min = 1, $max = $sum);
            $pos = -1;
            $numSt = 0;
            do{
                $pos++;
                $numSt += (int)$data[$pos]['weight'];
            } while ($numSt<$j && $numSt!=$sum);
            yield $data[$pos];
        }
    }
    foreach (ran($sum, $data) as $val) {
        $key = array_search($val, $data);
        $data2[$key]['count']++;
        $data2[$key]['calculated_probability'] = $data2[$key]['count']/10000;
    }

    print_r(json_encode($data2, JSON_UNESCAPED_UNICODE));




} else {
    include "web.html";
}
?>
</body>
</html>

