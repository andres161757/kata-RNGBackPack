<?php

namespace Deg540\CleanCodeKata9;

class BackPack
{
    public function gestionarBackPack(string $accion): string
    {
        if (empty($accion)) {
            return "";
        }

        $peticion = explode(" ", $accion);

        $verbo = $peticion[0];
        $objeto = $peticion[1];
        $cantidad = $peticion[2];

        if (count($peticion) === 2) return $objeto ." x1";
        else return $objeto . " " . $cantidad;
    }
}
