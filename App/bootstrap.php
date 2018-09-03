<?php
require_once 'config/config.php';
/*
    - This will require all the php file whatever is called
    - For example a new Core is initialized 
    - then $className will be Core
*/
spl_autoload_register(function ($className){
    $classRequired = 'libraries/' . $className . '.php';
    require_once $classRequired;
});
?>