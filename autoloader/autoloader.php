<?php

namespace Autoloader\Autoloader;

spl_autoload_register('Autoloader\Autoloader\myautoLoader');
function myautoLoader($className)
{
    $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'action')!==false || strpos($url, 'views')!==false) {
        $path="../";
    } else {
        $path="";
    }
    $extension=".php";
    $fullpath=$path.$className.$extension;
    $fullpath_elements=explode("/", $fullpath);
    $fullpath_slash=str_replace("\\", "/", $fullpath);
    $fullpath_prefix=str_replace("PHPCRUD/", "", $fullpath_slash);
    $fullpath_elements=explode("/", $fullpath_prefix);
    $fullpath_elements[0]=strtolower($fullpath_elements[0]);
    $fullpath_elements[1]=strtolower($fullpath_elements[1]);
    $fullpath_prefix=implode("/",$fullpath_elements);
    include_once $fullpath_prefix;
}
?>