<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <meta charset="UTF-8">
		<title>Login- Opine Mais </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
		     <link rel="shortcut icon" href="css/images/short.png"/>

    </head>
    <body>
        <div class="main">
        <?php include ("header.php")?>
        
         
        <div class="content">
          <div id="login">
                        <header id="header">
		             <h2>Login</h2>
                        </header> 
       		     <p style="text-align: center; color: red;">
                        <?php 
                            if(!empty($_GET['mensagem'])){
                                echo $_GET['mensagem'];
                            }
                        ?>
                    </p>
        				</header>
        			<form method="POST" action="control/loginUsuarioControl.php">
          			<fieldset >
                  <legend>Dados de Login</legend>
                  <p><label for="email">E-mail:</label><br/>
          	      <input type="email" placeholder="Digite seu Email" name="email" id="email" size=40 required="email">  </p>
                  <p><label for="senha">Senha:</label><br/>
          	      <input type="password" placeholder="Digite sua Senha" name="senha" id="senha" size=40 required="senha">  </p>
          			</fieldset>
          			<div class="12u">
          				<ul class="actions">
          					<li><input type="submit" class="button" value="Entrar" alt="Aperte Enter Para entrar"/></li>
                    <li><a href="cadastroUsuario.php" class="button" alt="Aperte Enter para um novo Cadastro">Cadastrar-se</a></li>
                    <!--<li><a href="#" class="button3" alt="Aperte Enter para um novo Cadastro"><img src="css/images/face.png" style="width:1.5em;"><br></a></li>-->
          				</ul>
          			</div>
        			</form>
			      </div>
        </div>
            <br>
            <br>
            <br>
         <br>
         <br>
         <br>
         <br>

            <?php include("footer.php") ?>
      </div>
          
    
