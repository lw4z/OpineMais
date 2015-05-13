
	<!DOCTYPE HTML>
	<html>
		<head>
		<meta charset="UTF-8">
		<title>Home - Opine Mais </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
                <link rel="stylesheet" type="text/css" href="css/estilo.css">
		    <link rel="shortcut icon" href="images/logtop.png" />
                    
	</head>
	<body>
            <div class="main">
       
		<?php include("header.php")?>
                <?php include("leftBar.php")?>
                <?php include("rightBar.php")?>

				<div id="content">
		<header class="major">
			<h2>Cadastro de Produtos</h2>
			<h4><?php$mensagem?></h4>
		</header>
		<!-- Formulário aqui! -->
                <form method="POST" action="php/cadastrarProduto.php"enctype="multipart/form-data" >

			<fieldset>
				<legend>
					<strong>Dados do Produto</strong>
				</legend>
                                 <p>
					<label for="nome">Nome do Produto:</label> <input type="text"
						name="nome" id="nome" size=60>
				</p>
				<p>
					<label for="descrição">Descrição:</label> <input type="text"
						name="descricao" id="descrição" size=60>
				</p>
				<p>
					<label for="marca">Marca:</label> <input type="text"
					name="marca" id="marca" size=60>
				</p>
				
				<p>
					<label for="arquivo">Upload de Imagem:</label> <input type="file" name="arquivo"
						id="arquivo" size=10>					
				</p>
				
				<p>
					<label for="categoria">Categoria:<select
						name="categoria" id="categoria">
							<option selected="não selecionado" value="não selecionado">Escolha
								a categoria</option>
							<option value="eletroeletronicos">Eletroeletrônico</option>
                                                        <option value="eletrodomestico">Eletrodomésticos</option>
                                                        <option value="Tv">TVs</option>
                                                        <option value="cosmeticos">Celulares e Smartphones</option>
							<option value="cosmeticos">Cosméticos</option>
							
					</select>
					</label>
					
				</p>
			</fieldset>

			<div class="12u">
				<ul class="actions">
					<li><input type="submit" value="Confirmar Cadastro" /></li>
					<!-- <li><input type="reset" value="Limpar" /></li>-->
				</ul>
			</div>


		</form>
	</div>
				</div>
      
        	
                                

  <?php include("footer.php") ?>
       </div>
        </div>