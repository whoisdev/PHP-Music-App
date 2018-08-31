<?php

$db["host"]="localhost";
$db["user"]="root";
$db["password"]="";
$db["database"]="spotify";
foreach ($db as $key=>$value){
    define(strtoupper($key),$value);
}

$connection = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

if(!$connection){
    die(mysqli_error());
}

function validate_query($query){
    global $connection;
    return mysqli_real_escape_string($connection,$query);
}

?>