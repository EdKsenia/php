<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use complexNumber\ComplexNumber;

require_once 'complexNumber/ComplexNumber.php';

class ComplexNumberTest extends TestCase
{
    public function testToString()
    {
        $my = new ComplexNumber(1, 5);
        $this->expectOutputString("1 + 5*i");
        echo $my;
    }
    public function testSum()
    {
        $my = new ComplexNumber(1, 5);
        $second = new ComplexNumber(2, 6);
        $my->add($second);
        $this->assertEquals(new ComplexNumber(3,11), $my);
    }

    public function testSub()
    {
        $my = new ComplexNumber(1, 5);
        $second = new ComplexNumber(2, 6);
        $my->sub($second);
        $this->assertEquals(new ComplexNumber(-1,-1), $my);
    }

    public function testMult()
    {
        $my = new ComplexNumber(1, 5);
        $second = new ComplexNumber(2, 6);
        echo $my;
        $my->mult($second);
        $this->assertEquals(new ComplexNumber(-28,16), $my);
    }

    public function testDiv()
    {
        $my = new ComplexNumber(1, 5);
        $second = new ComplexNumber(2, 6);
        $my->div($second);
        $this->assertEquals(new ComplexNumber(0.8,0.1), $my);
    }
}
