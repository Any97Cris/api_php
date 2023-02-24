<?php

use Util\RotasUtil;
use Validator\RequestValidator;
use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

include 'bootstrap.php';

try{
    $request = new RequestValidator(RotasUtil::getRotas());
    $retorno = $request->processarRequest();

    $JsonUtil = new JsonUtil();
    $JsonUtil->processarArrayParaRetornar($retorno);


}catch(Exception $e){
    echo json_encode([
        ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
        ConstantesGenericasUtil::RESPOSTA => utf8_encode($e->getMessage())

    ]);
    exit;
}



?>