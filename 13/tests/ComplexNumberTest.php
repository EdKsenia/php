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

    public function testGetReal(){
        $my = new ComplexNumber(1, 5);

        $this->assertEquals(1, $my->get_real());
    }

    public function testGetComplex(){
        $my = new ComplexNumber(1, 5);

        $this->assertEquals(5, $my->get_complex());
    }

    public function textSetReal(){
        $my = new ComplexNumber(1, 5);
        $my->set_real(9);
        $this->assertEquals(new ComplexNumber(9,5), $my);
    }

    public function textSetComplex(){
        $my = new ComplexNumber(1, 5);
        $my->set_complex(9);
        $this->assertEquals(new ComplexNumber(1,9), $my);
    }

    public function testDivO(){
        $my = new ComplexNumber(1, 5);
        $second = new ComplexNumber(0, 0);
        $this->expectOutputString('Нельзя делить на 0');
        $my->div($second);
    }


}
