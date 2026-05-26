<?php

namespace Deg540\CleanCodeKata9;

class BackPack
{
    private array $mochila = [];
    public function gestionarBackPack(string $accion): string
    {
        if (empty($accion)) {
            return "";
        }

        $peticion = explode(" ", $accion);

        $objeto = $peticion[1];
        $cantidad = $peticion[2];

        if (count($peticion) === 2) $this->mochila[] = $objeto ." x1";
        else $this->mochila[] = $objeto . " " . $cantidad;

        $resultado = implode(" - " , $this->mochila);
        return $resultado;
    }
}
