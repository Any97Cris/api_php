<?php

namespace Repository;
use DB\MySQL;

class TokensAutorizadosRepository{

    private object $mysql;
    public const TABELA = "tokens_autorizados";

    public function __construct(){
        $this->mysql = new MySQL();
    }

    public function validarToken($token){

    }

    public function getMySQL(){
        return $this->mysql;
    }

}

?>