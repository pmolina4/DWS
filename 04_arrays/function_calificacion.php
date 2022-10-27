<?php

function Calificacion(int $nota){

    return match ($nota) {
        0,1,2,3,4 => 'suspenso',
        5,6 => 'aprobado',
        7,8 => 'notable',
        9,10 => 'sobresaliente', 
        default => 'Sin calificar',
    };
}

?>