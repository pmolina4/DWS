<?php
function factorial(int $numero)
{
    $resultado = 1;

    if ($numero >= 1) {
        for ($i = 1; $i <= $numero; $i++) {
            $resultado = $resultado * $i;
        }
    } else {
        $resultado = -1;
    }
    return $resultado;
}
