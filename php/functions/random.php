<?php

function cRandom($lenght){
    $dataset = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','p','q','r','s','t','u','v','w','x','y','z',1,2,3,4,5,6,7,8,9);
    shuffle($dataset);
    $key = ''; //
    for($i=0; $i<$lenght; $i++) {
        $key .= strtoupper_modified(trim($dataset[rand(0, count($dataset))]));
    }
    $pass = trim($key);
    return $pass;
}

function strtoupper_modified($string) {
    $splitString = str_split_php4($string);
    $fString = ''; // Initialise it.
    foreach($splitString as $value) {
        if(is_numeric($value)) {
            $fString .= $value;
        } else {
            $fString .= strtoupper($value);
        }
    }

    return $fString;
}

function str_split_php4($text, $split = 1) {
    if (!is_string($text)) return false;
    if (!is_numeric($split) && $split < 1) return false;
    $len = strlen($text);
    $array = array();
    $s = 0;
    $e=$split;
    while ($s <$len) {
        $e=($e <$len)?$e:$len;
        $array[] = substr($text, $s,$e);
        $s = $s+$e;
    }
    return $array;
}

?>
