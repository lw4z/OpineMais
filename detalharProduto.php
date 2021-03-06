<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comentar Produto - Opine Mais </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
                 <link rel="shortcut icon" href="css/images/short.png"/>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/funcao.js"></script>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('form.rating').rating();
            });</script>
    </head>
    <body>

        <div class="main">
            
            <?php session_start();?>
            <?php include("header.php"); ?>
           
            <?php include_once('imports.php'); ?>
            <?php 
                $id_produto = $_REQUEST['id_produto'];

                $produto = new Produto();
                $produto->setId_produto($id_produto);

                $fachada = Fachada::getInstance();
                $produto = $fachada->pesquisarProduto($produto);
                
                if(empty($produto)){
                    header('Location:home.php');
                }
                if(!empty($_SESSION['usuario'])){
                    $serializacao = $_SESSION['usuario'];
                    $usuario = unserialize($serializacao);
                }
                if(!empty($produto->getOpinioes()) && !empty($_SESSION['usuario'])){
                    foreach ($produto->getOpinioes() as $opiniaoTeste){
                        if($opiniaoTeste->getUsuario()->getId_usuario() == $usuario->getId_usuario()){
                            $jaOpinou = $usuario;
                        }
                    }
                }
            ?>

                       <div id="header4">
                 <h1 id="detalhes"><?php echo $produto->getNome_produto(); ?></h1>
                    <img src="images/upload/<?php echo $produto->getImagem(); ?>" id="imacoment" class="imagem" />
                         <div id="info">
                           
                        
                       <h1>Detalhes</h1>
                        
                      <p> <strong>Fabricante: </strong><?php echo $produto->getMarca();?></p>
                      <p> <strong>Descrição: </strong><?php echo $produto->getDetalhes();?></p>
                      
                      <p>
                      <img src="images/bom.png"  id="opiniao" alt="bom" height="42" width="42"/>
                        <?php 
                            echo '( '.$produto->getQualificacao_positiva().' )';
                        ?> 
                      <img src="images/ruim.png"  id="opiniao" alt="ruim" height="42" width="42"/>
                        <?php 
                            echo '( '.$produto->getQualificacao_negativa().' )'; 
                        ?>
                      <p>
            </div>
            
                  
                        </div>  
            
                   
            <div id="geral">
 
 
                    <div class="postagem">
                        
               

                       
                        <img src="css/images/user.png" alt="Foto de Usuario"  style="width:2.2em;" />
                        <b><?php echo $produto->getUsuario()->getNome(); ?></b>
                        <?php 
                            if(!empty($_SESSION['usuario'])){
                                if($usuario->getId_usuario() == $produto->getUsuario()->getId_usuario()){
                                    echo  '<div align="left"><a href="editarProduto.php?id_produto='.$produto->getId_produto().'">'
                                        . 'Editar <img src="images/icon_editar.png"  id="postagem" alt="editar"/></a>'
                                        . ' '
                                        . '<a href="control/excluirProdutoControl.php?id_produto='.$produto->getId_produto().'">'
                                        . 'Excluir <img src="images/icon_excluir.png"  id="postagem" alt="excluir"/></a></div>';
                                }
                            }
                        ?>
                        <p>
                            <b>Descrição:</b> <br/>
                            <?php echo $produto->getDetalhes(); ?>
                        </p>
                        
                        
                        <div id="opiniao">
                        <?php 
                            if(!empty($_SESSION['usuario'])){
                                if(empty($jaOpinou)){
                        ?>  
                                <h4>Opine sobre o produto</h4>

                                    <form action="control/cadastrarOpiniaoControl.php" method="post" name="form1" id="opiniao">
                                        <input type="hidden" name="id_produto" value="<?php echo $produto->getId_produto();?>" />

                                        <img src="images/bom.png"  id="opiniao" alt="bom" height="30" width="30"/><?php echo Qualificacao::BOM;?>
                                        <input type="radio" name="qualificacao" required="qualificacao"value="<?php echo Qualificacao::BOM;?>"> 
                                        <img src="images/ruim.png"  id="opiniao" alt="ruim" height="30" width="30"/><?php echo Qualificacao::RUIM;?>
                                        <input type="radio" name="qualificacao" value="<?php echo Qualificacao::RUIM;?>">
                                        <br/>   
                                        <input type="text" name="mensagem" size="50" value="Digite sua opinião" class="campo"/>
                                        
                                        
                                        <div id="enviar"><input type="submit" value="Enviar"></div>
                                    </form>
<br>
                        <?php
                                }else{
                                    echo '<h3 align="center">Você já opinou sobre o produto</h3>';
                                }
                            }else{
                                echo '<h3 align="center">Você precisa fazer login para opinar sobre o produto</h3>';
                            }
                            
                            if(!empty($produto->getOpinioes())){
                                
                                echo '<h4 align=center>Opiniões</h4>';
                                
                                foreach ($produto->getOpinioes() as $opiniao){
                        ?>

                            <div class="comentarios" id="<?php echo $id_opiniao; ?>" style="background-color:#C7CFE9">
                                        <strong>
                                            <img src="css/images/user.png" alt="Foto de Usuario"  style="width:2.2em;" />
                                            <?php 
                                                echo $opiniao->getUsuario()->getNome()
                                                        .'<br/>Qualificacao: '.$opiniao->getQualificacao(); 
                                            ?>
                                        </strong>
                                        <p><?php echo $opiniao->getMensagem(); ?></p>
                                        <?php 
                                            if(!empty($_SESSION['usuario'])){
                                                if($usuario->getId_usuario() == $opiniao->getUsuario()->getId_usuario()){
                                                    echo  '<div align="right"><a href="editarOpiniao.php?id_opiniao='.$opiniao->getId_opiniao().'">'
                                                            . 'Editar <img src="images/icon_editar.png"  id="opiniao" alt="editar"/></a>'
                                                            . ' '
                                                            . '<a href="control/excluirOpiniaoControl.php?id_opiniao='.$opiniao->getId_opiniao().'">'
                                                            . 'Exluir <img src="images/icon_excluir.png"  id="opiniao" alt="excluir"/></a></div>';
                                                }
                                            }
                                        ?>
                                    


                                    <div id="comentario">
                                    <?php
                                        if(!empty($opiniao->getComentarios())){
                                            foreach ($opiniao->getComentarios() as $comentario){
                                    ?> 

                                                <div class="respostas" id="id_resposta<?php echo $comentario->getId_comentario(); ?>">
                                                    <img src="css/images/user.png" alt="Foto de Usuario"  style="width:2.2em;" />
                                                    <strong><?php echo $comentario->getUsuario()->getNome(); ?></strong>
                                                    <p><?php echo $comentario->getMensagem(); ?></p>
                                                    <?php 
                                                        if(!empty($_SESSION['usuario'])){
                                                            if($usuario->getId_usuario() == $comentario->getUsuario()->getId_usuario()){
                                                                echo  '<div align="right"><a href="editarComentario.php?'
                                                                        . 'id_produto='.$produto->getId_produto().'&id_comentario='.$comentario->getId_comentario().'">'
                                                                        . 'Editar <img src="images/icon_editar.png"  id="comentario" alt="editar"/></a>'
                                                                        . ' '
                                                                        . '<a href="control/excluirComentarioControl.php?'
                                                                        . 'id_produto='.$produto->getId_produto().'&id_comentario='.$comentario->getId_comentario().'">'
                                                                        . 'Exluir <img src="images/icon_excluir.png"  id="comentario" alt="excluir"/></a></div>';
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                    <?php 
                                            }
                                            
                                        }else{
                                            echo '<div align="center">Nenhum comentario sobre essa opinião</div>';
                                        }
                                        if(!empty($_SESSION['usuario'])){
                                    ?>
                                        <h4>Comente a opinião:</h4>
                                        <form action="control/cadastrarComentarioControl.php" method="post" name="form_comentario" id="form_comentario" style="padding:10px;">
                                            <input type="hidden" name="id_opiniao" value="<?php echo $opiniao->getId_opiniao(); ?>" />
                                            <input type="hidden" name="id_produto" value="<?php echo $produto->getId_produto(); ?>" />
                                            <input type="text" name="mensagem" value="Digite seu comentario sobre a opinião" class="campo" size="50"/>

                                             <div id="enviar"><input type="submit" value="Enviar"></div>
                                        </form>
                                   
                        
                        <?php 
                                        }
                        ?>
                                    </div><!--id comentario-->
                                </div><!--classe comentario-->
                        <?php
                                } //Final do foreath de opinioes
                                
                            } else{
                        ?>
                                <div align="center" style="background-color:#C7CFE9">Nenhum opiniao sobre o produto</div>
                        <?php
                            }
                        ?>
                            
                       </div><!--id opiniao-->
                    </div><!--classe postagem-->
            <?php
                include 'model/util/reg_comentario.php';
                include 'model/util/reg_resposta.php';
            ?>

            </div><!--geral-->
        </div>

<!--
</div>
</div>
-->
    </body>
</html>


                                <!--<span class="abre_respostas">Respostas</span>-->
                                <?php
//                                if (!empty($_GET['id_opiniao'])) {
//                                    if ($_GET['id_opiniao'] == $id_opiniao) {
//                                        echo '<div id="comentarios" style="display:block">';
//                                    } else {
//                                        echo '<div id="comentarios">';
//                                    }
//                                } else {
//                                    echo '<div id="comentarios">';
//                                }
                                ?>