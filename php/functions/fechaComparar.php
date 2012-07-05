<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function crearLimite($fecha){
    list($year,$mon,$day) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day,$year));;
}

function calculaTimeStamp($fecha){
    list($year,$mon,$day) = explode('-',$fecha);
    return mktime(0,0,0,$mon,$day,$year);
}

function calcularFechafinal($fecha,$tipo,$cuotas){
    list($year,$mon,$day) = explode('-',$fecha);
    if($tipo == 0){
        $cuotas = $cuotas / 2;    
        return date('Y-m-d',mktime(0,0,0,$mon+$cuotas,$day,$year));
    }
    return date('Y-m-d',mktime(0,0,0,$mon+$cuotas,$day,$year));
}
?>
