<?php

namespace Repository;
use DB\MySQL;


class UsuariosRepository{

    private object $MySQL;
    public const TABELA = "usuarios";

    public function __construct(){
        $this->MySQL = new MySQL();
    }

    public function getMySQL(){
        return $this->MySQL;
    }

}

?>