<?php

namespace Deg540\CleanCodeKata9;

class BackPack
{
    public function gestionarBackPack(string $accion): string
    {
        if (empty($accion)) {
            return "";
        }
        if ($accion === "equipar espada") return "espada x1";
        return "arco x1";
    }
}
