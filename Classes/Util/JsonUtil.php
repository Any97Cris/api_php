<?php

namespace Util;

use JsonException as JsonExceptionAlias;

class JsonUtil{

    public function processarArrayParaRetornar($retorno){
        $dados = [];
        $dados[ConstantesGenericasUtil::TIPO] = ConstantesGenericasUtil::TIPO_ERRO;

        if((is_array($retorno) && count($retorno) > 0) || strlen($retorno) > 10){
            $dados[ConstantesGenericasUtil::TIPO] = ConstantesGenericasUtil::TIPO_SUCESSO;
            $dados[ConstantesGenericasUtil::RESPOSTA] = $retorno;
        }

        $this->retornarJson($dados);

    }

    private function retornarJson($json){
        header('Content-Type: application/json');
        header('Cache-Control: no-cach, no-store, must-revalidade');
        header('Access-ControlAllow-Methods: GET,POST,PTU,DELETE');
        echo json_encode($json);
        exit;
    }

    public static function tratarCorpoRequisicaoJson(){
        try{
            $postJson = json_decode(file_get_contents('php://input', true));
        }catch(JsonExceptionAlias $j){
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_JSON_VAZIO);
        }

        if(is_array($postJson) && count($postJson) > 0){
            return $postJson;
        }
    }
    
}

?>