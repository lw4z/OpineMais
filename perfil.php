<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="UTF-8">
        <title>Perfil - Opine Mais </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="shortcut icon" href="images/logtop.png" />

    </head>
    <body>

        <?php include("header.php") ?>
        <?php include("leftBar.php") ?>
        <?php include("rightBar.php") ?>

        <div id="content">

            <!-- titulo do conteudo-->
            <header class="major">
                <h2>Perfil</h2>
            </header>
            <!-- Conteudo-->

            <fieldset>
                <legend>Dados de Login</legend>
                <p>
                    <b>E-mail: </b><?php echo $_REQUEST['email']?>  <br/>
                </p>
            </fieldset>

            <fieldset>
                <legend>Dados Pessoais</legend>
                <p class="p"><b> Nome: </b><?php echo $_REQUEST['nome']?>  </p>
            </fieldset>

                <ul class="actions">
                    <li><a href="control/editarPerfil.php" class="button">Editar Perfil</a></li>
                </ul>
        </div>
    </body>
</html>
