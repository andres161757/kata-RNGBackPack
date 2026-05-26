<?php

namespace Deg540\CleanCodeKata9\Test;

use Deg540\CleanCodeKata9\BackPack;
use PHPUnit\Framework\TestCase;

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
    /**
     * @test
     */
    function givenNDIfferentObjectReturnsThatObjects()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("equipar escudo x2");
        $gestionarBackpack = $backPack->gestionarBackPack("equipar arco");
        $gestionarBackpack = $backPack->gestionarBackPack("equipar espada");
        $this->assertEquals("escudo x2 - arco x1 - espada x1", $gestionarBackpack);
    }
    /**
     * @test
     */
    function givenSameObjectReturnsThatObject()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("equipar escudo x2");
        $gestionarBackpack = $backPack->gestionarBackPack("equipar escudo");
        $gestionarBackpack = $backPack->gestionarBackPack("equipar espada x2");
        $this->assertEquals("escudo x3 - espada x2", $gestionarBackpack);
    }
    /**
     * @test
     */
    function givenDesequiparObjectEmptyReturnsString()
    {
        $backPack = new BackPack();
        $gestionarBackpack = $backPack->gestionarBackPack("desequipar espada");
        $this->assertEquals("No tienes ese objeto en la mochila", $gestionarBackpack);
    }
}

