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
        $verbo = $peticion[0];
        $objeto = $peticion[1];

        if ($verbo === "equipar"){
            if (count($peticion) === 2) {
                $cantidad = 1;
                if(isset($this->mochila[$objeto])) $this->mochila[$objeto]++;

                else $this->mochila[$objeto] = $cantidad;
            }
            else {
                $cantidad = (int) str_replace("x", "", $peticion[2]);
                if(isset($this->mochila[$objeto])) $this->mochila[$objeto] += $cantidad;
                else $this->mochila[$objeto] = $cantidad;
            }

            $inventarioMostrar = [];
            foreach ($this->mochila as $nombreItem => $cantidadItem) {
                $inventarioMostrar[] = $nombreItem . " x" . $cantidadItem;
            }
            return implode(" - ", $inventarioMostrar);
        }
        else if($verbo === "desequipar"){
            if (count($peticion) === 2) {
                if(!isset($this->mochila[$objeto])) return "No tienes ese objeto en la mochila";
                else if($this->mochila[$objeto] === 1) unset($this->mochila[$objeto]);
                else {
                    $this->mochila[$objeto]--;
                }
            }
            else {
                $cantidad = (int) str_replace("x", "", $peticion[2]);
                if(!isset($this->mochila[$objeto])) return "No tienes ese objeto en la mochila";
                else if($this->mochila[$objeto] < $cantidad) return "No tienes suficiente cantidad de ese objeto";
                else if($this->mochila[$objeto] === $cantidad) unset($this->mochila[$objeto]);
                else {
                    $this->mochila[$objeto] -= $cantidad;
                }
            }
            $inventarioMostrar = [];
            foreach ($this->mochila as $nombreItem => $cantidadItem) {
                $inventarioMostrar[] = $nombreItem . " x" . $cantidadItem;
            }
            return implode(" - ", $inventarioMostrar);
        }
        else if($verbo === "limpiar"){
            $this->mochila[] = [];
            return "";
        }
    }
}
