<?php

use Util\RotasUtil;
use Validator\RequestValidator;
use Util\ConstantesGenericasUtil;

include 'bootstrap.php';

try{
    $request = new RequestValidator(RotasUtil::getRotas());
    $retorno = $request->processarRequest();
}catch(Exception $e){
    echo json_encode([
        ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
        ConstantesGenericasUtil::RESPOSTA => utf8_encode($e->getMessage())

    ]);
    exit;
}



?>