<?php
// This the App root also the App folder
define('APPROOT',dirname((dirname(__FILE__))));
// This is the URL name of the site also the public folder
define('URLROOT','https://musify-dev1203.c9users.io/');
// Site Name
define('SITENAME',"Dev's MVC");
/*
    Database parameters 
*/
define('DB_HOST',getenv('IP'));
define('DB_USER',getenv('C9_USER'));
define('DB_PASSWORD',"");
define('DB_NAME','c9');

?>