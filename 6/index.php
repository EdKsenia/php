<pre><?php
        $iniFile = parse_ini_file("index.ini");
//        print_r($iniFile);
        $text = fopen($iniFile["filename"], "r");
        while (!feof($text)) {
            $st = fgets($text);
            if (preg_match('|' . $iniFile["symbol1"] . '*|', $st)) {
                if ($iniFile["upper"] === true) {
                    $st = strtoupper($st);
                } else {
                    $st = strtolower($st);
                }
                print($st);
            } elseif (preg_match('|' . $iniFile["symbol2"] . '*|', $st)) {
                $arr = str_split($st);
                if ($iniFile["direction"] == "+") {
                    for ($i = 0; $i < count($arr); $i++) {
                        if (is_numeric($arr[$i]) && $arr[$i] != 9) {
                            $arr[$i]++;
                        }
                        if ($arr[$i] == 9) {
                            $arr[$i] = 0;
                        }
                    }
                } else {
                    for ($i = 0; $i < count($arr); $i++) {
                        if (is_numeric($arr[$i]) && $arr[$i] != 0) {
                            $arr[$i]++;
                        }
                        if ($arr[$i] === 0) {
                            $arr[$i] = 9;
                        }
                    }
                }
                $st = implode("", $arr);
                print($st);
            }
            elseif(preg_match('|' . $iniFile["symbol3"] . '*|', $st)){
                $st = str_replace($iniFile["delete"], "", $st);
                print($st);
            }
                else{
                print($st);
            }

        }
        fclose($text);
    ?>
</pre>


