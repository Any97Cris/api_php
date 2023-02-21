<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

define("HOST", 'localhost');
define("BANCO", 'api');
define("USER", 'root');
define("SENHA", '');


define("DS", DIRECTORY_SEPARATOR);
define("DIR_APP", __DIR__);

if(file_exists('autoload.php')){
    include 'autoload.php';
}else{
    echo "Erro ao incluir bootstrap.php";
    exit;
}


?>