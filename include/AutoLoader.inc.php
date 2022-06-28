<?php
declare(strict_types=1);

spl_autoload_register('autoLoader');

function autoLoader($classFile){
    $path = "classes/";
$ext = ".class.php";
    $fullPath = $path . $classFile . $ext;
    if (!file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
}