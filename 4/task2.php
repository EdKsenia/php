
<?php

function ran($json)
{
    $arr = json_decode($json, true);
    if ($arr != null) {
        $sum = $arr['sum'];
        $data = $arr['data'];
        for ($i = 0; $i < 10000; $i++) {
            $j = mt_rand($min = 1, $max = $sum);
            $pos = -1;
            $numSt = 0;
            do {
                $pos++;
                $numSt += (int)$data[$pos]['weight'];
            } while ($numSt < $j && $numSt != $sum);
            yield $data[$pos];
        }
    }
}


foreach (ran($json1) as $val) {
    $d = json_decode($json1, true)['data'];
    $key = array_search($val, $d);
    $data2[$key]['count']++;
    $data2[$key]['calculated_probability'] = $data2[$key]['count'] / 10000;
}


