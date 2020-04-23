<pre><?php
    require_once("LoggerBrowser.php");
    require_once("LoggerFile.php");
    require_once("Logger.php");

    if (isset($_POST["send"])) {
        $text = (string)$_POST["text"];
        $arr_str = explode(PHP_EOL, $text);
        $file = (string)$_POST["file"].".txt";
        $s = "Строка \"";
        $yes = "\" содержит заглавные буквы";
        $no = "\" не содержит заглавные буквы";
        foreach ($arr_str as $str) {
            $isUp = preg_match('|^.*[A-Z].*$|', $str);
            if ($isUp) {
                $str = $s . $str . $yes;
            } else {
                $str = $s . $str . $no;
            }
            if (isset($_POST["loggerF"])) {
                $str = $str."\r\n";
                $f_log = new LoggerFile($str, $file);
                $f_log->writeString();
            }
            if (isset($_POST["loggerB"])) {
                $t = "";
                if (isset($_POST["time"])){
                    $t = date("h:i:s:v ");
                }
                elseif (isset($_POST["date"])){
                    $t = date("h:i:s d F o ");
                }
                elseif (isset($_POST["time"])){
                    $t = "";
                }
                $b_log = new LoggerBrowser($str, $t);
                $b_log->writeString();
                print("</br>");
            }
        }

    } else {
        include "web.html";
    }
    ?>



</pre>


