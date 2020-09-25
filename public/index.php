<?php
namespace PHPMVC;
use PHPMVC\LIB\Frontcontroller;

if(!define("DS")){
    define("DS",DIRECTORY_SEPARATOR);
}
require '..'.DS.'app'.DS.'config.php';
require_once  APP_PATH.DS.'lib'.DS.'autoload.php';

$fontcontroller= new Frontcontroller();
$fontcontroller->dispatch();
