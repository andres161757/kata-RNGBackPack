<?php

namespace Deg540\CleanCodeKata9\Test;

use Deg540\CleanCodeKata9\BackPack;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertThat;

class BackPackTest extends TestCase
{
    /**
     * @test
     */
    function givenEmptyStringReturnsEmptyString()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("");
        $this->assertEquals("", $gestionarBackpack);
    }
    /**
     * @test
     */
    function givenAnyObjectReturnsThatObject()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("equipar escudo");
        $this->assertEquals("escudo x1", $gestionarBackpack);
    }
    /**
     * @test
     */
    function givenNObjectReturnsThatObjectXN()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("equipar escudo x3");
        $this->assertEquals("escudo x3", $gestionarBackpack);
    }
}

