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
    function givenEmptyStringReturnsEmpryString()
    {
        $backpack = new BackPack();
        $gestionarBackpack = $backpack->backpack("");
        assertThat("", $gestionarBackpack);
    }
}

