<pre><?php

if (isset($_POST["send"])) {
    $par_pos = 0;
    $text = $_POST["text"];
    $del = "\n";
    $arr = explode($del, $text);//массив вводимых строк
    $sum = 0;
    $data2 = array();
    $data = array();

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
        $array2 = array('text' => $t, 'count' => (int)0,
            'calculated_probability' => 0);
        array_push($data, $array);
        array_push($data2, $array2);
    }
    $json1 = (json_encode(['sum' => $sum, 'data' => $data], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    print("Task 1:");
    print_r($json1);
    print("<br/>");
    print("<br/>");
    print("Task 2:");
    print("<br/>");


    include "task2.php";

    print_r(json_encode($data2, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));


} else {
    include "web.html";
}
?>
</pre>


