<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorUsuario
 *
 * @author Jackson
 */
class ControladorUsuario {
    
    private $repositorioUsuario;
    
    function __construct() {
        $this->repositorioUsuario = RepositorioUsuario::getInstance();
    }
    
    public function adicionarUsuario(\Usuario $entidade) {
        $senha = $entidade->getSenha();
        $senhaCodificada = md5($senha);
        $entidade->setSenha($senhaCodificada);
        
        $this->repositorioUsuario->adicionar($entidade);
    }

    public function editarUsuario(\Usuario $entidade) {
        $u = $this->repositorioUsuario->pesquisar($entidade);
        
        if($u->getSenha() != $entidade->getSenha()){
            $senhaCriptografada = md5($entidade->getSenha());
            $entidade->setSenha($senhaCriptografada);
        }
                
        $this->repositorioUsuario->editar($entidade);
    }

    public function listarUsuario() {
        return $this->repositorioUsuario->listar();
    }

    public function pesquisarUsuario(\Usuario $entidade) {
        return $this->repositorioUsuario->pesquisar($entidade);
    }

    public function removerUsuario(\Usuario $entidade) {
        $this->repositorioUsuario->remover($entidade);
    }

}
