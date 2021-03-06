<?php
namespace exception;
class SecondException extends FirstException{
    public function __construct($message, $code = 0, Exception $previous = null) {
        $this->message = $message;
        parent::__construct($message, $code, $previous);
    }
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
