<?php
			include 'conecta.php';
			include 'upflor.php';

?>

<!DOCTYPE html>
<html>
    <head>
		<title>
			Cadastrar flor
		</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet">
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
		
	</head>
	<body>
		<div class="rel">
		<div class="image">
			<div class="centralizarfont">
				<h1>Cadastre flores</h1>
			</div>
		</div>
		</div>
		<div class="containerfull">
			<div class="setarfontnormal mgbottombig ">
				<h2 class="editarfont">Cadastre as flores de acordo com o mês em que ela floresce</h2>	
				
			</div>
			<form method="post" action="upflor.php" enctype="multipart/form-data">
				<div class="setarfontnormal">
					<div class="setartamanhomaior">
						<div class="setartamanho">
							<h2 class="mgbottomsmall editarfont">Nome</h2>
							<input class="tamanhoinput " name='nome' type="text" placeholder="Qual o nome da flor"></input>
							<h2 class="mgbottomsmall editarfont">Espécie</h2>
							<input class="tamanhoinput " name='nomeCientifico' type="text" placeholder="Qual a espécie ou nome científico"></input>
						</div>
						<div class="setartamanhomenor">
								<label for="upload" class="circulo">
									<img src="uploads/Vector.png">
								</label>
								<input id="upload" type="file" name="image" style="display:none">
						</div>
					</div>	
					<h2 class="mgbottomsmall editarfont">Descrição</h2>
					<input class="tamanhoinput2 mgbottommedium" required name='descricao' type="text" placeholder="Escreva uma breve descrição sobre a flor"></input>
					<div>
						<h2 class="mgbottomsmall editarfont">Quais os meses a flor irá florecer</h2>
						<div class = "divmeses mgbottommedium">
						<?php
							$query = "SELECT * FROM mes"; 
							$result_query = mysqli_query($link, $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );

							while ($row = mysqli_fetch_array( $result_query )) 
							{ 	
								echo '<input type="checkbox"  name="meses['. $row['id'] .']" id="'. $row["id"] .'" value="' . $row["id"] . '" style="display:none;"></input>';
								echo '<label for="'.$row["id"].'">' . $row["abreviacao"] . '</label>';
								
								
							}
						?>				
						</div>
					</div>
					<label for="idSelect2">
						<h2 class="mgbottomsmall editarfont">
							Selecione as abelhas que polinizam essas flores
						</h2>
					</label>
					<div class="setartamanhomaior justificaritens mgbottombig">
						<div class="setartamanhomaior">
							<select class="dropbox select2 form-control" id="idSelect2" name="nomeAbelha[]" multiple tabindex="-1" style="display: none;">
								<?php
									$query = "SELECT * FROM abelha"; 
									$result_query = mysqli_query($link, $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );
									echo '<option value=""</option>';
									while ($row = mysqli_fetch_array( $result_query )) 
									{ 	
										echo '<option value="'. $row["id"] . '">' . $row["nome"] . '</option>';	
									}		
								?>							
							</select>
						</div>
						
						<div class="setartamanho_1">
							<div class="quadrado">
								<h2>+</h2>
							</div>
							
						</div>
					</div>
				</div>
			<div class="posicionabotao">
				<div class="flex-end"> 
					<a href="index.php">
						<div class="divborder" style="">
							<h2>Cancelar</h2>
						</div>
					</a>
					
					<button type="submit" name="submit">
						
							<h2>
								Cadastrar flor	
							</h2>
						
					</button>
					
				</div>				
			</div>
		</form>
		</div>

		<div class="flex">
			<div class="posicionarodapeesq">
				<img src="css/flor 1 1.png">
			</div>	
			<div class="posicionarodapedir">
				<img src="css/flor 3 4.png" >
			</div>
		</div>
			
	
	
	<script>
		$(".select2").select2();
		


	</script>
							
	</body>
</html>

