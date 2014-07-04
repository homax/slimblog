<?php
function myAutoload($class){
    require_once("/public/app/model/".$class.'.php');
}
function myAutoload2($class){
    require_once("/public/app/controller/".$class.'.php');
}
spl_autoload_register("myAutoload");
spl_autoload_register("myAutoload2");