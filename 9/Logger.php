<?php
abstract class Logger{
    public $str;
    public $param;
    abstract protected function __construct($string, $p);
    abstract protected function writeString();

}
