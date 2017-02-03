
<!-- COMENTÁRIOS

 <h1> - Representa o título principal da página
 <img> - Representa uma imagem
 <em>  - Marcação de enfâse (itálico)
 
 -->

<!DOCTYPE html>

<html>

	<!--  <head>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/estilos.css"> -->

		<!-- Importando o CSS do mobile -->
		<!-- <link rel="stylesheet" href="css/mobile.css" media="(max-width: 939px)"> 

		<meta charset="utf-8"> -->

		<!-- Adaptando para mobile -> declarando a meta tag com o viewport dentro do <head> da index.html. -->
		<!-- <meta name="viewport" content="width=device-width">

	</head>  -->
	
		<!--  <header class="container">
		<h1><img src="img/logo.png" alt="Mirror Fashion"></h1>
		  <p class="sacola">
		  		Nenhum item na sacola de compras
		  </p>

		<nav class="menu-opcoes">
		  <ul>
			 <li><a href="#">Sua conta</a></li>
			 <li><a href="#">Lista de Desejos</a></li>
			 <li><a href="#">Cartão Fidelidade</a></li>
			 <li><a href="sobre.php">Sobre</a></li>
			 <li><a href="#">Ajuda</a></li>
		  </ul>
		</nav>
	</header> -->
	
	<body>
		<?php
			$cabecalho_title = "Produto da Mirror Fashion";
			include("cabecalho.php");
		?>
	</body>

	<a href="#" class="pause"></a>
	
	<div class="container destaque">
		
		<section class="busca">
			<h2>Busca</h2>
			
			<form action="http://www.google.com.br/search" id="form-busca">
				<input type="search" name="q" id="q">
				<input type="image" src="img/busca.png">
			</form>

		</section> <!--  Fim do objeto busca -->

		<section class="menu-departamentos">
			<h2>Departamentos</h2>

			<nav>
				<ul>
					<li>
						<a href="#">Blusas e Camisas</a>
						<ul>
							<li><a href="#">Manga curta</a></li>
							<li><a href="#">Manga comprida</a></li>
							<li><a href="#">Camisa social</a></li>
							<li><a href="#">Camisa casual</a></li>
						</ul>
					</li>
					<li><a href="#">Calças</a></li>
					<li><a href="#">Saias</a></li>
					<li><a href="#">Vestidos</a></li>
					<li><a href="#">Sapatos</a></li>
					<li><a href="#">Bolsas e Carteiras</a></li>
					<li><a href="#">Acessórios</a></li>
				</ul>
			</nav>
		</section> <!-- Fim .menu-departamentos -->

		<img  src="img/destaque-home.png" alt="Promoção: Big City Night">

	</div>
	
	<div class="container paineis">
		
		<!-- ************************************************************************* -->
		<!-- Seleciona os produtos/novidades, conforme a data (de cadastro) -->
		<section class="painel novidades">
			<h2>Novidades</h2>
			<ol>
				<?php 
					$conexao = mysqli_connect("127.0.0.1", "root", "admin", "WD43");
					$dados = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY data DESC LIMIT 0, 6");
					while ($produto = mysqli_fetch_array($dados)):
				?>
				
				<li>
					<a href="produto.php?id=<?=$produto['id'] ?> ">
						<figure>
							<img src="img/produtos/miniatura<?=$produto['id'] ?>.png" alt="<?=$produto['nome'] ?> ">
							<figcaption><?=$produto['nome'] ?> por <?=$produto['preco'] ?></figcaption>
						</figure>
					</a>
				</li>
				<?php endwhile; ?>
			</ol>
		</section>
		
		
		<!-- ************************************************************************* -->
		<!-- Seleciona os produtos mais vendidos,ordenando pelo preço -->
		<section class="painel mais-vendidos">
			<h2>Mais Vendidos</h2>
			<ol>
				<?php 
					$dados = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY vendas DESC LIMIT 0, 6");
					while ($produto = mysqli_fetch_array($dados)):
				?>
				
				<li>
					<a href="produto.php?id=<?=$produto['id'] ?> ">
						<figure>
							<img src="img/produtos/miniatura<?=$produto['id'] ?>.png" alt="<?=$produto['nome'] ?> ">
							<figcaption><?=$produto['nome'] ?> por <?=$produto['preco'] ?></figcaption>
						</figure>
					</a>
				</li>
				<?php endwhile; ?>
			</ol>
		</section>
		
	</div>
	
	<?php include("rodape.php"); ?>
	

	<!-- **************************** -->
	<!-- Código JavaScript -->
	
		<script>

			//document.querySelector('#q').onsubmit = validaBusca;
			
			/*document.querySelector('#form-busca').onfocus = function() {
					document.querySelector('#form-busca').style.background = 'red';
					//return false;
				}
			};*/


			/* Faz o banner "ficar" rotativo na tela */
			var timer = setInterval("trocaBanner()", 4000);
			var controle = document.querySelector('.pause');
			
			controle.onclick = function() {
				if (controle.className == 'pause') {
					clearInterval(timer);
					controle.className = 'play';
				} else {
					timer = setInterval("trocaBanner()", 4000);
					controle.className = 'pause';
				}
				
				return false;
			}
			
			
			/*vericar se o elemento com id=q (o campo de busca) está vazio. Se estiver, */
			/* mostramos um alert e abortamos a submissão do formulário*/
			document.querySelector('#form-busca').onsubmit = function() {
				if (document.querySelector('#q').value == '') {
					document.querySelector('#form-busca').style.background = 'red';
					return false;
				}
			 
			};

		</script>
	
	<!-- **************************** -->
	
	<script src="js/home.js"></script>

</html>

