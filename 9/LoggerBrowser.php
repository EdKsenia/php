<?php
require_once("Logger.php");
class LoggerBrowser extends Logger{
//    public $str;
//    public $param;
    function __construct($string, $d) {
        $this->str = $string;
        $this->param = $d;
    }

    public function writeString()
    {
        print($this->param." ".$this->str);
    }

}
