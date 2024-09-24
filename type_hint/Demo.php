<?php

declare(strict_types=1);

require_once 'A.php';
require_once 'B.php';
require_once 'C.php';
require_once 'I.php';

class Demo 
{
    // đánh giá  A
    public function typeAreturnA(): A
    {
        echo __FUNCTION__ . "</br>";
        return new A(); 
    }

    public function typeBreturnA(): A 
    {
        echo __FUNCTION__ . "</br>";
        return new A(); 
    }

    public function typeCreturnA(): A 
    {
        echo __FUNCTION__ . "</br>";
        return new A(); 
    }

    public function typeIreturnA(): I 
    {
        echo __FUNCTION__ . "</br>";
        return new A(); 
    }

    public function typeNullreturnA(): ?A 
    {
        echo __FUNCTION__ . "</br>";
        return null; 
    }

    // đánh giá  B
    public function typeAreturnB(): B
    {
        echo __FUNCTION__ . "</br>";
        return new B(); 
    }

    public function typeBreturnB(): B
    {
        echo __FUNCTION__ . "</br>";
        return new B(); 
    }

    public function typeCreturnB(): B 
    {
        echo __FUNCTION__ . "</br>";
        return new B(); 
    }

    public function typeIreturnB(): I
    {
        echo __FUNCTION__ . "</br>";
        return new B(); 
    }

    public function typeNullreturnB(): ?B 
    {
        echo __FUNCTION__ . "</br>";
        return null; 
    }

    // đánh giá  C
    public function typeAreturnC(): C
    {
        echo __FUNCTION__ . "</br>";
        return new C(); 
    }

    public function typeBreturnC(): C 
    {
        echo __FUNCTION__ . "</br>";
        return new C(); 
    }

    public function typeCreturnC(): C
    {
        echo __FUNCTION__ . "</br>";
        return new C(); 
    }

    public function typeIreturnC(): I 
    {
        echo __FUNCTION__ . "</br>";
        return new C(); 
    }

    public function typeNullreturnC(): ?C 
    {
        echo __FUNCTION__ . "</br>";
        return null;
    }

    // đánh giá I
    public function typeAreturnI(): I 
    {
        echo __FUNCTION__ . "</br>";
        return new A(); 
    }

    public function typeBreturnI(): I 
    {
        echo __FUNCTION__ . "</br>";
        return new B(); 
    }

    public function typeCreturnI(): I 
    {
        echo __FUNCTION__ . "</br>";
        return new C(); 
    }

    public function typeIreturnI(): I 
    {
        echo __FUNCTION__ . "</br>";
        return new A(); 
    }

    public function typeNullreturnI(): ?I 
    {
        echo __FUNCTION__ . "</br>";
        return null; 
    }
}

$demo = new Demo(); 

// kq
$demo->typeAreturnA();
$demo->typeBreturnA();
$demo->typeCreturnA();
$demo->typeIreturnA();
$demo->typeNullreturnA();

$demo->typeAreturnB();
$demo->typeBreturnB();
$demo->typeCreturnB();
$demo->typeIreturnB();
$demo->typeNullreturnB();

$demo->typeAreturnC();
$demo->typeBreturnC();
$demo->typeCreturnC();
$demo->typeIreturnC();
$demo->typeNullreturnC();

$demo->typeAreturnI();
$demo->typeBreturnI();
$demo->typeCreturnI();
$demo->typeIreturnI();
$demo->typeNullreturnI();
