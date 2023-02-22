<?php

include 'bootstrap.php';

use Validator\RequestValidator;
use Util\RotasUtil;


try{
    $request = new RequestValidator(RotasUtil::getRotas());
    $retorno = $request->processarRequest();
}catch(Exception $e){
    echo "Error: ".$e->getMessage();
}



?>