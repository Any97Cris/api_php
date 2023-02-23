<?php

namespace Repository;
use DB\MySQL;
use Util\ConstantesGenericasUtil;

class TokensAutorizadosRepository{

    private object $MySQL;
    public const TABELA = "token_autorizados";

    public function __construct(){
        $this->MySQL = new MySQL();
    }

    public function validarToken($token){
        var_dump($token);
        exit;
    }

    public function getMySQL(){
        return $this->MySQL;
    }

}

?>