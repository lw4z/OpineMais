<div id="nav2">

    <div id="header-wrapper">
          
        <div id="header2">

            <h1 id="logo"><a href="home.php"><img src="css/images/opinemais.png"   style="width:5.5em ;height:3.5em;"></a></h1>

            <ul class="divided">

               <li><img src="css/images/user.png" alt="Logo Perfil"  style="width:2.2em;" /> Olá, 
                    <?php
                    include_once ('imports.php');

                    // session_start();

                    if (!empty($_SESSION['usuario'])) {
                        $serializacao = $_SESSION['usuario'];
                        $usuario = unserialize($serializacao);
                        echo $usuario->getNome();
                    } else {
                        echo 'Visitante';
                    }
                    ?>  </li>

            </ul>

            <ul class="btheader">
<div style="margin-bottom:-3.7em; display:block;position:relative; 
              padding-left:29%;" >
        <form action="home.php" method="POST" >
            
                <input type="search" name="busca" placeholder="Buscar..." results=5 size=60 />
                
            </form>
        </div>
                <?php
                if (!empty($_SESSION['usuario'])) {

                    echo '<li><a href="perfil.php">Perfil</a></li>'
                    . '<li><a href="cadastroProduto.php">Novo Iten</a></li>';
  
                    echo '<li ><a href="model/util/logout.php">Sair</a></li>';
                } else {

                    echo '<li><a href="login.php">Entre</a></li>';
                    echo '<li><a href="cadastroUsuario.php">Cadastre-se</a></li>';
                    echo '<li></li>';
                }
                ?>

            </ul>

        </div>

    </div>

</div>

