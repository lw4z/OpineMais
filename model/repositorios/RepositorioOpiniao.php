<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RepositorioOpiniao
 *
 * @author Jackson
 */
include("../util/connection.php");

class RepositorioOpiniao implements IRepositorio{
    public function adicionar(\Opiniao $entidade) {
        $result = mysql_query("insert into opiniao(mensagem,qualificacao,nota,id_usuario,id_produto) "
                . "values "
                . "('".$entidade->getMensagem()."',"
                . "'".$entidade->getQualificacao()."',"
                . $entidade->getNota().","
                . $entidade->getUsuario()->getId_usuario().","
                . $entidade->getProduto()->getId_produto().")");
//        echo $result;
//        echo 'Cadastro de Opiniao FEITO';
    }

    public function editar(\Opiniao $entidade) {
        $result = mysql_query("update opiniao set "
                . "mensagem = '".$entidade->getMensagem()."', "
                . "qualificacao = '".$entidade->getQualificacao()."', "
                . "nota = ".$entidade->getNota()
                . "where id_opiniao = ".$entidade->getId_opiniao());
    }

    public function listar() {
        $result = mysql_query('select * from opiniao');
        while( $sql = mysql_fetch_array($result)){
            $id_opiniao = $sql['id_opiniao'];
            $mensagem = $sql['mensagem'];
            $qualificacao = $sql['qualificacao'];
            $nota = $sql['nota'];
            $id_usuario = $sql['id_usuario'];
            $id_produto = $sql['id_produto'];
            
            $usuario = new Usuario($id_usuario);
            $produto = new Produto($id_produto);
            $opiniao = new Opiniao($id_opiniao, $mensagem, $qualificacao, $nota, $usuario, $produto);
        }
        return $opiniao;
    }

    public function pesquisar(\Opiniao $entidade) {
        $result = mysql_query('select * from opiniao where id_opiniao = '.$entidade->getId_opiniao());
        while( $sql = mysql_fetch_array($result)){
            $id_opiniao = $sql['id_opiniao'];
            $mensagem = $sql['mensagem'];
            $qualificacao = $sql['qualificacao'];
            $nota = $sql['nota'];
            $id_usuario = $sql['id_usuario'];
            $id_produto = $sql['id_produto'];
            
            $usuario = new Usuario($id_usuario);
            $produto = new Produto($id_produto);
            $opiniao = new Opiniao($id_opiniao, $mensagem, $qualificacao, $nota, $usuario, $produto);
        }
        return $opiniao;  
    }

    public function remover(\Opiniao $entidade) {
        $result = mysql_query('delete from opiniao where id_opiniao = '.$entidade->getId_opiniao());
    }

//put your code here
}
