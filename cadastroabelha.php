
<?php		
	include 'conecta.php';
?>

<!DOCTYPE html>
<html>
    <head>
		<title>
			Cadastrar abelha
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
				<h1>Cadastre abelhas</h1>
			</div>
		</div>
		</div>
		<div class="containerfull setarfontnormal">
					<label for="idSelect2">
						<h2 class="mgbottommedium editarfont">
							Selecione as abelhas
						</h2>
					</label>
			<form method="post" action="cadastroabelha.php">
				<div class="setarfontnormal">
					<div class="setartamanhomaior">
						<div class="setartamanho2 mgbottombigger">
							<h2 class="mgbottomsmall editarfont">Nome</h2>
							<input class="tamanhoinput mgbottommedium " name='nomea' type="text" placeholder="Qual o nome da abelha"></input>
							<h2 class="mgbottomsmall editarfont">Espécie</h2>
							<input class="tamanhoinput " name='nomeCientificoa' type="text" placeholder="Qual a espécie ou nome científico"></input>
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
						<button type="submit" name="submit2">
								<h2>
									Cadastrar abelha	
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
			
	
							
	</body>
</html>
<?php

	mysqli_select_db($link,$dbname) or die (mysql_error());

	if((isset($_POST['submit2'])) && (isset($_POST['nomea'])) && (isset($_POST['nomeCientificoa']))) {
		
		$nomea = ($_POST['nomea']);
		$nomeCientificoa = ($_POST['nomeCientificoa']);
		header("Location: cadastroabelha.php");

	$sql = "INSERT INTO abelha (nome, nomeCientifico) VALUES ('$nomea', '$nomeCientificoa')";
	if(mysqli_query($link, $sql)){
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	}
	mysqli_close($link);
?>

