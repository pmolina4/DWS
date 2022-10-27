<?php

function Calificacion(int $nota){

    match ($nota) {
        $nota >= 0 && $nota <= 4 => 'suspenso',
        $nota >=5 && $nota <=6 => 'aprobado',
        $nota >= 7 && $nota <=8 => 'notable',
        $nota >= 9 && $nota <= 10 => 'sobresaliente', 
        default => 'Sin calificar',
    };

    return $nota;
}

?>