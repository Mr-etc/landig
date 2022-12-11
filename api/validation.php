<?php
$validExp = require_once 'validationConf.php';
class Validation{
    static function checkValue($exp, $value){
        $validExp = $GLOBALS['validExp'];
        return preg_match($validExp[$exp], $value)? $value:'';
    }
}