<?php

namespace logger;

use loggerInterface\LoggerInterface;

require "LoggerInterface.php";

class Logger implements LoggerInterface
{
    public $arr_json = [];
    public $filePath;//путь к файлу
    public $template = "{date} {type} {content}";//сообщение
    public $file;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        $this->file = fopen($this->filePath, 'a');
    }

    function __destruct()
    {
        $json = json_encode($this->arr_json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        fwrite($this->file, $json);
        fclose($this->file);
    }

    public function log($level, $message, array $context = [])
    {
        switch ($level) {
            case "emergency":
                $this->emergency($message, $context);
                break;
            case "alert":
                $this->alert($message, $context);
                break;
            case "critical":
                $this->critical($message, $context);
                break;
            case "error":
                $this->error($message, $context);
                break;
            case "warning":
                $this->warning($message, $context);
                break;
            case "notice":
                $this->notice($message, $context);
                break;
            case "info":
                $this->info($message, $context);
                break;
            case "debug":
                $this->debug($message, $context);
                break;
            default:
                echo "No info";
        }
    }

//Система не работает
    public function emergency($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

//Действие требует безотлагательного вмешательства
    public function alert($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

//Критические состояния (компонент системы недоступен, неожиданное исключение)
    public function critical($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

//Ошибки исполнения, не требующие сиюминутного вмешательства
    public function error($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

//Исключительные случаи, но не ошибки
    public function warning($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

//Существенные события, но не ошибки
    public function notice($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

//Интересные события
    public function info($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

// Подробная информация для отладки
    public function debug($message, array $context = [])
    {
        $this->createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    private function createJson($level, $message)
    {
        $info = ['date' => date("d.m.y G:i:s:u"), 'type' => $level, 'content' => $message];
        array_push($this->arr_json, $info);
    }
}