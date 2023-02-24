<?php

namespace Service;

use InvalidArgumentException;
use Repository\UsuariosRepository;
use Util\ConstantesGenericasUtil;

class UsuariosService{

    public const TABELA = 'usuarios';
    public const RECURSOS_GET = ['listar'];
    public const RECURSOS_DELETE = ['deletar'];
    public const RECURSOS_POST = ['cadastrar'];

    private array $dados;
    private ?array $dadosCorpoRequest;

    private object $UsuariosRepository;   
    
    
    public function __construct($dados = []){
        $this->dados = $dados;
        $this->UsuariosRepository = new UsuariosRepository();
    }

    public function validarGet(){
        $retorno = null;
        $recurso = $this->dados['recurso'];
        
        if(in_array($recurso, self::RECURSOS_GET)){
            $retorno = $this->dados['id'] > 0 ? $this->getOneByKey() : $this->$recurso();
        }else{
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if($retorno === null){
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }

        return $retorno;
    }

    public function validarDelete(){

        $retorno = null;
        $recurso = $this->dados['recurso'];
        
        if(in_array($recurso, self::RECURSOS_DELETE)){
            if($this->dados['id'] > 0){
                $retorno = $this->$recurso();
            }else{
                throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_ID_OBRIGATORIO);
            }
        }else{
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if($retorno === null){
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }

        return $retorno;
    }

     public function validarPost(){

        $retorno = null;
        $recurso = $this->dados['recurso'];
        
        if(in_array($recurso, self::RECURSOS_POST, true)){
            $retorno = $this->$recurso();
        }else{
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
        }

        if($retorno === null){
            throw new \InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_GENERICO);
        }

        return $retorno;
    }

    public function setDadosCorpoRequest($dadosRequest){
        $this->dadosCorpoRequest = $dadosRequest;      
    }

    public function getOneByKey(){
        return $this->UsuariosRepository->getMySQL()->getOneByKey(self::TABELA, $this->dados['id']);
    }

    public function listar(){
        return $this->UsuariosRepository->getMySQL()->getAll(self::TABELA);
    }

    private function deletar(){
        return $this->UsuariosRepository->getMySQL()->delete(self::TABELA, $this->dados['id']);
    }

    private function cadastrar(){
        var_dump($this->dadosCorpoRequest);
        exit;
    }
}

?>