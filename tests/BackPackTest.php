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
    function givenOneObjectReturnsThatObject()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("equipar arco");
        $this->assertEquals("arco x1", $gestionarBackpack);
    }
    /**
     * @test
     */
    function givenAnotherOneObjectReturnsThatObject()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("equipar espada");
        $this->assertEquals("espada x1", $gestionarBackpack);
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
}

