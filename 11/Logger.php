<?php
namespace logger;
use loggerInterface\LoggerInterface;
require "LoggerInterface.php";

class Logger implements LoggerInterface
{
    public $arr_json = [];
    public $filePath;//путь к файлу
    public $template = "{date} {message} {context}";//сообщение
    public $file;
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        $this->file = fopen($this->filePath, 'a');
    }

    function __destruct()
    {
        $json = json_encode($this->arr_json,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        fwrite($this->file, $json);
        fclose($this->file);
    }

    public function log($level, $message, array $context = [])
    {
        $info = ['date' => date("d.m.y G:i:s:u"), 'type' => $level, 'context'=>$context];
        array_push($this->arr_json,$info);
    }


    public function emergency($message, array $context = [])
    {
    }

    public function alert($message, array $context = [])
    {
    }

    public function critical($message, array $context = [])
    {
    }

    public function error($message, array $context = [])
    {
    }

    public function warning($message, array $context = [])
    {
    }

    public function notice($message, array $context = [])
    {
    }

    public function info($message, array $context = [])
    {
    }

    public function debug($message, array $context = [])
    {
    }
}