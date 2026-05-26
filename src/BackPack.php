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

        if (count($peticion) === 2) {
            $cantidad = 1;
            if(isset($this->mochila[$objeto])) $this->mochila[$objeto]++;

            else $this->mochila[$objeto] = $cantidad;
        }
        else {
            $cantidad = (int) str_replace("x", "", $peticion[2]);
            if(isset($this->mochila[$objeto])) $this->mochila[$objeto]++;
            else $this->mochila[$objeto] = $cantidad;
        }

        $inventarioMostrar = [];
        foreach ($this->mochila as $nombreItem => $cantidadItem) {
            $inventarioMostrar[] = $nombreItem . " x" . $cantidadItem;
        }
        return implode(" - ", $inventarioMostrar);
    }
}
