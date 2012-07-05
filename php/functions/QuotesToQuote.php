<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function QuotesToQuote($mensaje){
    $mensaje = str_replace("\"","'",$mensaje);
    return $mensaje;
}

?>
