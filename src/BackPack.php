<?php

namespace Deg540\CleanCodeKata9;

class BackPack
{
    public function gestionarBackPack(string $accion): string
    {
        if (empty($accion)) {
            return "";
        }

        $objeto = explode(" ", $accion);
        if (count($objeto) === 2) return $objeto[1] ." x1";
        else return $objeto[1] ." x2";
    }
}
