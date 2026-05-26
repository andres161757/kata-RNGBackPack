<?php

namespace Deg540\CleanCodeKata9;

class BackPack
{
    public function gestionarBackPack(string $accion): string
    {
        if (empty($accion)) {
            return "";
        }
        return "arco x1";
    }
}
