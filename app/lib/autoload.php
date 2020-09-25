<?php
namespace PHPMVC\LIB;

if(!define("DS")){
    define("DS",DIRECTORY_SEPARATOR);
}
class Autoload
{
    static public function autoload($className)
    {

        $className = strtolower(str_replace(['PHPMVC\\', '\\'], ['', '/'], $className));
        if (file_exists(APP_PATH . DS . $className . '.php')) {
            require APP_PATH . DS . $className . '.php';
        }
    }
}
spl_autoload_register(__NAMESPACE__.'\Autoload::autoload');

