<?php
if(!define("DS")){
    define("DS",DIRECTORY_SEPARATOR);
}
define('APP_PATH',realpath(__DIR__));
define('VIEWS_PATH',APP_PATH.DS.'views'.DS);