<?php

function config($field){
    return $GLOBALS['mysql'][$field];
}

function is_assoc($array = array()){
    $keys = array_keys($array);
    return array_keys($keys) !== $keys ? true : false;
}