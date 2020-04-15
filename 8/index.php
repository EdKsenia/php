<!---->
<!--Построить календарь для указанного пользователем месяца, используя встроенные классы для-->
<!--работы с датой и временем и перебор итератора. Если месяц не указан, выводить календарь для-->
<!--текущего месяца, выделяя жирным текущий день. Календарь должен быть расположен-->
<!--стандартной сеткой (разные недели в разных строках, с понедельника по воскресенье) с-->
<!--выделением выходных красным.-->


<pre><?php
    if (isset($_POST["send"])) {
        $month = (string)$_POST["month"];
        $now = new DateTime();
        $year = date('Y');
        $months = array(
            "1" => "январь",
            "2" => "февраль",
            "3" => "март",
            "4" => "апрель",
            "5" => "май",
            "6" => "июнь",
            "7" => "июль",
            "8" => "август",
            "9" => "сентябрь",
            "10" => "октябрь",
            "11" => "ноябрь",
            "12" => "декабрь");
        $date = 0;
        if(!array_search($month, $months)){
            $month = date("F");
            $monthnumber = date("m");
            $dayofmonth = date('t', mktime(0, 0, 0, $monthnumber));
        }
        else{
            $monthnumber = array_search($month, $months);
            $dayofmonth = date('t', mktime(0, 0, 0, array_search($month, $months)));
        }
        $first = new DateTime();
        $first->setDate($year, $monthnumber, 1);
        $step = new DateInterval('P1D');
        $period = new DatePeriod($first, $step, $dayofmonth - 1);
        $week = array();
        $num = 0;
        foreach ($period as $datetime) {
            $dayofweek = date("w", $datetime->getTimestamp());
            if($dayofweek != 0){
                $dayofweek--;
            }
            elseif ($dayofweek == 0){
                $dayofweek = 6;
            }
            $week[$num][$dayofweek] = date("d", $datetime->getTimestamp());
            if ($dayofweek == 6) {
                $num++;
            }
        }
        if(!array_search($month, $months)){
            $date = date("d");
        }
        echo $month;
        echo "<br>";
        echo "<table border=1>";
        for ($i = 0; $i < count($week); $i++) {
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                if (!empty($week[$i][$j])) {
                    if($week[$i][$j]==$date){

                        if ($j == 6 || $j == 5)
                            echo "<td><font color=red><b>" . $week[$i][$j] ."</b></font></td>";
                        else echo "<td><b>" . $week[$i][$j] ."</b></td>";
                    }
                    else{
                        if ($j == 6 || $j == 5)
                            echo "<td><font color=red>" . $week[$i][$j] . "</font></td>";
                        else echo "<td>" . $week[$i][$j] . "</td>";
                    }
                } else echo "<td>&nbsp;</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    } else {
        include "web.html";
    }
    ?>
</body>
    </html>


</pre>


