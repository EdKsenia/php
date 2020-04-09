<!--3. Для tracert вывести список IP-адресов через пробел-->
<!--Формат вывода утилит можно посмотреть запустив консоль (cmd.exe)-->
<!--Требования: экранирование введённых пользователем данных; при ошибке выводить осмысленный-->
<!--текст-->




<pre><?php
    header("Content-Type: text/html; charset=utf-8");
    ini_set('max_execution_time', 900);

    if (isset($_POST["send"])) {
        $text = (string) $_POST["text"];
        $ping = array();
        $tracert = array();
        $ping8 = array();
        $tracert8 = array();
        $ping_count = array();
        $count = 0;
        echo '<b>' . $text .'</b>';
        if (isset($_POST["ping"])){
            print("<br/>");
            exec("ping $text", $ping);
            $ping = array_slice($ping, 1);
            $i = 0;
            foreach ($ping as $value){
                $ping8[$i] = iconv("CP866","utf-8", $value);
                $i++;
            }
            foreach ($ping8 as $value) {
                if(preg_match('|^.*\d{1,2}%.*$|', $value, $ping_count)){
                    $matches = preg_split("/^(\s)*\(/", $value);
                    $matches = preg_split("/[%]/", $matches[1]);
                    $count = 100 - $matches[0];
                    echo "ping: {$count}%\n";
                }
            }
        }
        if (isset($_POST["tracert"])){
            print("<br/>");
            print("<br/>");
            exec("tracert $text", $tracert);
            $tracert = array_slice($tracert, 1);
            $i = 0;
            foreach ($tracert as $value){
                $tracert8[$i] = iconv("CP866","utf-8", $value);
                $i++;
            }
            echo "tracert: ";
            $end = "";
            foreach ($tracert8 as $value) {
                if(preg_match('|^\s*Трассировка\sмаршрута\sк.*$|', $value)){
                    $matches = preg_split("/\[/", $value);
                    $matches = preg_split("|\].*$|", $matches[1]);
                    $end = $matches[0];
                }
                elseif(preg_match('|^\s*1\s+.*$|', $value)){
                    $matches = preg_split("/\[/", $value);
                    $matches = preg_split("/\].*$/", $matches[1]);
                    echo "$matches[0] ";
                }
                elseif(preg_match('|^.*\d{1,3}\sms\s{2}\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}.*$|', $value)){
                    $matches = preg_split("/^.*\d{1,3}\sms\s/", $value);
                    $str = str_replace(' ', '', $matches[1]);
                    if(preg_match("|^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$|", $str, $matches)){
                        echo "$matches[0] ";
                    }
                    else{
                        $matches = preg_split("/\.\D+.*/", $str);
                        echo "$matches[0] ";
                    }
                }
            }
            echo "$end ";
        }

    } else {
        include "web.html";
    }
    ?>
</body>
    </html>


</pre>


