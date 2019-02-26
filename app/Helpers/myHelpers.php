<?php

function hazArray($elementos, $campo1, $campo2) {
    $array = array();
    foreach ($elementos as $genre) {
        $array[$genre->$campo1] = $genre->$campo2;
    }
    return $array;
}

function fecha() {
    return date("Y/m/d");
}

