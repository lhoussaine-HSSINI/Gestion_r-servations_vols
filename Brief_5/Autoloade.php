<?php 
session_start();
require_once './constant_base_url.php';
spl_autoload_register(function ($class_name){
    $array_paths_folder=array(
        'Controllers/',
        'Database/',
        'Models/'
    );
    $parts= explode("\\", $class_name);
    $name=array_pop($parts);
    foreach($array_paths_folder as $path){
        $file=sprintf($path.'%s.php',$name);
        if (is_file($file)) {
            include_once $file;
        }
    }
});