<?php

namespace Autoloader\Autoloader;

spl_autoload_register('Autoloader\Autoloader\myautoLoader');
function myautoLoader($className)
{
    $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'autoloader')!==false) {
        $path="../";
    } else {
        $path="";
    }
    $extension=".php";
    $fullpath=$path.$className.$extension;
    $fullpath_slash=str_replace("\\", "/", $fullpath);
    $fullpath_prefix=str_replace("PHPCRUD/", "", $fullpath_slash);
    include_once $fullpath_prefix;
}
?>