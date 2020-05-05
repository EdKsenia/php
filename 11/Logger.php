<?php
namespace logger;
require_once("LoggerInterface.php");

class Logger implements LoggerInterface
{
    public $filePath;//путь к файлу
    public $template = "{date} {message} {context}";//сообщение

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function log($level, $message, array $context = [])
    {
        $json = json_encode(['date' => date("d.m.y G:i:s:u"), 'type' => $message,
            'context'=>$context],JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $json, FILE_APPEND);
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