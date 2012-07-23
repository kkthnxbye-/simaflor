<?php

session_start();

foreach ($_POST as $key => $value) {
   $$key =$value;
}

if (empty($_SESSION['entradatmp'])) {
   $lista = array();
} else {
   $lista = unserialize($_SESSION['entradatmp']);
}

$lista2 = array();

$c = 0;
$c1 = 0;

foreach ($lista as $l) {
   if ($c != $id) {
      $lista2[$c1] = $l;
      $c1++;
   }
   $c++;
}
$_SESSION['entradatmp'] = serialize($lista2);