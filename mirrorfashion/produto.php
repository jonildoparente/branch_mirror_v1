
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/produto.css">
	</head>
<body>
    <?php
		$cabecalho_title = "Produto da Mirror Fashion";
		include("cabecalho.php"); 
		$cabecalho_css = '<link rel="stylesheet" href="css/produto.css">';
		
		/* Abre conexão com o banco de dados e selecione os dados do produto **/
		$conexao = mysqli_connect("127.0.0.1", "root", "admin", "WD43");
		$dados   = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = $_GET[id]");
		$produto = mysqli_fetch_array($dados);
	?>
		
  <div class="produto-back">	
	
	<div class="container">
		
		<div class="produto">

			<h1><?= $produto['nome'] ?></h1>
			<p>por apenas <?= $produto['preco'] ?></p>
			
			
			<form action="checkout.php" method="POST">
			
				<input type="hidden" name="id" value="<?= $produto['id'] ?>">
				<input type="hidden" name="nome" value="  <?= $produto['nome'] ?>">

				<!-- FieldSet para escolher a cor -->
				<!-- ************************************************** -->
				<fieldset class="cores">

					<legend>Escolha a cor:</legend>
				    
				    <input type="radio" name="cor" value="verde" id="verde" checked>
					<label for="verde">
						<img src="img/produtos/foto<?= $produto['id'] ?>-verde.png">
					</label>
		
					<input type="radio" name="cor" value="rosa" id="rosa">
					<label for="rosa">
						<img src="img/produtos/foto<?= $produto['id'] ?>-rosa.png">
					</label>		
		
					<input type="radio" name="cor" value="azul" id="azul">
					<label for="azul">
						<img src="img/produtos/foto<?= $produto['id'] ?>-azul.png">
					</label>

				</fieldset>
				
				<!-- Add em 14/08/2015 -->
				<!-- FieldSet para escolher ao tamanho -->
				<!-- ************************************************** -->
				<fieldset class="tamanhos">
					<legend>Escolha o tamanho:</legend>
				    <input type="range" min="36" max="46" value="42" step="2" name="tamanho" id="tamanho">
				</fieldset>
				
				<input type="submit" class="comprar" value="Comprar">

			</form>
		</div>
		
		<!-- Detalhes do produto -->
		<div class="detalhes">
			<h2>Detalhes do produto</h2>
			
			<p>Esse é o melhor <?= $produto['descricao'] ?> que você já viu. Excelente material italiano com estampa desenhada pelos artesãos da
				comunidade de Krotor nas ilhas gregas. Compre já e receba hoje mesmo pela nossa entrega a jato.</p>
				
			<table>
			
			    <!-- Cabeçalho da tabela -->
				<thead>
					<th>Caracteristicas</th>
					<th>Detalhe</th>
				</thead>
				
				<!-- Itens/linhas da tabela -->
				<tbody>
					<tr>
						<td>Modelos</td>
						<td>Cardigã 7845</td>
					</tr>
					<tr>
					<td>Material</td>
						<td>Algodão e poliester</td>
					</tr>
					<tr>
						<td>Cores</td>
						<td>Azul, Rosa e Verde</td>
					</tr>
					<tr>
						<td>Lavagem</td>
						<td>Lavar a mão</td>
					</tr>
				</tbody>
				
			</table>
			
		</div>
		
	</div>
	
  </div>
  
	<?php include("rodape.php"); ?>

</body>

</html>