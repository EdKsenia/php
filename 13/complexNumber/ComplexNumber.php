<?php


namespace complexNumber;


class ComplexNumber
{
//    real+complex*i
    public float $real;
    public float $complex;

    function __construct($x, $y)
    {
        $this->real = $x;
        $this->complex = $y;
    }

    function __toString()
    {
        return $this->real . " + " . $this->complex . "*i";
    }

    function get_real():float
    {
        return $this->real;
    }

    function get_complex(): float
    {
        return $this->complex;
    }

    function set_real(): void
    {
        $this->real;
    }

    function set_complex(): void
    {
        $this->complex;
    }

    function add(ComplexNumber $number): void
    {
        $this->real = $this->real + $number->get_real();
        $this->complex = $this->complex + $number->get_complex();
    }

    function sub(ComplexNumber $number): void
    {
        $this->real = $this->real - $number->get_real();
        $this->complex = $this->complex - $number->get_complex();
    }

    function mult(ComplexNumber $number): void
    {
        $r = $this->real;
        $c = $this->complex;
        $this->real = ($this->real)*($number->get_real())-($this->complex)*$number->get_complex();
        $this->complex = ($r)*($number->get_complex())+($c)*$number->get_real();
    }

    function div(ComplexNumber $number): void
    {
        $r = $this->real;
        $c = $this->complex;
        $this->real = ($this->real*$number->get_real()+$this->complex*$number->get_complex())/(pow($number->get_complex(),2)+pow($number->get_real(),2));
        $this->complex = (-$r*$number->get_complex()+$c*$number->get_real())/(pow($number->get_complex(),2)+pow($number->get_real(),2));
    }

    function abs(): float
    {
        return sqrt(pow($this->real,2)+pow($this->complex,2));
    }


}