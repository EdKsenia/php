<?php

use exception\FirstException;
use exception\SecondException;
use exception\ThirdException;
use exception\FourthException;
use exception\FifthException;
class MyClass
{
    public $a;
    public $b;

    function create()
    {
        $a = rand(1, 5);
        $b = $a;
        while ($a == $b) {
            $b = rand(1, 5);
        }
        $this->a = rand(1, 5);
        $this->b = rand(1, 5);
    }
    function toString(){
        echo $this->a." ".$this->b;
    }

    function chose($value)
    {
        switch ($value) {
            case 1:
                throw new FirstException('FirstException', 1);
                break;
            case 2:
                throw new SecondException('SecondException', 2);
                break;
            case 3:
                throw new ThirdException('ThirdException', 3);
                break;
            case 4:
                throw new FourthException('FourthException', 4);
                break;
            case 5:
                throw new FifthException('FifthException', 5);
                break;
        }
    }

    public function first()
    {
        $this->create();
        $this->chose($this->a);
        $this->chose($this->b);

    }

    public function second()
    {
        $this->create();
        $this->chose($this->a);
        $this->chose($this->b);
    }

    public function third()
    {
        $this->create();
        $this->chose($this->a);
        $this->chose($this->b);
    }

    public function fourth()
    {
        $this->create();
        $this->chose($this->a);
        $this->chose($this->b);
    }
}