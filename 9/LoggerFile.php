<?php
require_once("Logger.php");
class LoggerFile extends Logger
{
//    public $str;
//    public $param;
    public $fd;

    function __construct($string, $file_name) {
        $this->str = $string;
        $this->param = $file_name;
    }

    public function writeString()
    {
        $this->fd = fopen($this->param, 'a') or die("файл не создан");
        fwrite($this->fd, $this->str);

    }

    function __destruct()
    {
        fclose($this->fd);
    }
}