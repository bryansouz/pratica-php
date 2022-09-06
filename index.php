<?php

function p($number, $potencia){
    $i = 1;
    $resultado = 1;
    do{
        $i++;
        $resultado *= $number;
   }while($i <= $potencia);
   return $resultado;
}
echo p(2,3);