<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Senha - Opine Mais </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
     
<script src="js/script.js"></script>
        <link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="shortcut icon" href="css/images/short.png"/>
    </head>
    <body>
         <div class="main">
        <?php session_start();?>     
        <?php include("header.php"); ?>
       
        <?php include_once("imports.php"); ?>
        <?php
            if(!empty($_SESSION['usuario'])){
                $serializacao = $_SESSION['usuario'];
                $usuario = unserialize($serializacao);
            }else{
                header('Location: home.php');
            }
        ?>
        

          <!-- titulo do conteudo-->
         <header id="header">
            <h5>Editar Perfil</h5>
         </header>
              <!-- Conteudo-->
             <form method="post" name="f1"
                   action="control/editarSenhaControl.php">
			
			<fieldset>
				<legend>Edição de Senha</legend>
                                <p style="text-align: center; color: red;">
                                    <?php 
                                        if(!empty($_GET['mensagem'])){
                                            echo $_GET['mensagem'];
                                        }
                                    ?>
                                </p>
				<p>
					<label for="senhaAtual">Senha Atual</label><br><input type="password"
						placeholder="Digite a Senha Atual" name="senhaAtual" id="senhaAtual" size=30 required="senhaAtual">
				</p>

				<p>
					<label for="senhaNova">Nova Senha</label><br> <input type="password"
						placeholder="Digite a nova Senha" name="senhaNova" id="senhaNova" size=30 required="senhaNova">
				</p>
				<p>
					<label for="confirmarSenha">Confirmar Senha</label><br> <input type="password"
						placeholder="Digite a nova Senha Novamente" name="confirmarSenha" id="confirmarSenha" size=30 required="confirmarSenha" onblur="validarSenha()">
				</p>
				

			</fieldset>
			
				<ul class="actions">
                                   
					<li><input type="submit" value="Confirmar" onblur="validarSenha()"  onClick="validarSenha()"/></li>
					<!-- <li><input type="reset" class="button3" value="Limpar" ></li> -->

				</ul>
			
		</form>
        </div>
    </body>
</html>
