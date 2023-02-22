<?php

namespace Validator;

use Util\ConstantesGenericasUtil;
use Repository\TokensAutorizadosRepository;

class RequestValidator{
    private $request;
    private array $dadosRequest;
    private object $tokenAutorizadosRepository;
    const GET = 'GET';
    const DELETE = 'DELETE';

    public function __construct($request){     
        $this->request = $request;
        $this->tokenAutorizadosRepository = new TokensAutorizadosRepository();
    }

    public function processarRequest(){
        $retorno = utf8_encode(ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA);

        $this->request['metodo'] == 'POST';

        if(in_array($this->request['metodo'], ConstantesGenericasUtil::TIPO_REQUEST, true)){
            $retorno = $this->direcionarRequest();
        }
        return $retorno;
    }

    private function direcionarRequest(){

        if($this->request['metodo'] !== self::GET && $this->request['metodo'] !== self::DELETE){
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
        }

    }

}

?>