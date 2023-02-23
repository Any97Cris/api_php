<?php

use Util\RotasUtil;
use Validator\RequestValidator;

include 'bootstrap.php';

try{
    $request = new RequestValidator(RotasUtil::getRotas());
    $retorno = $request->processarRequest();
}catch(Exception $e){
    echo "Error: ".$e->getMessage();
}



?>