<?php
	include 'conecta.php'
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Tela inicial
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
		<script type="text/javascript" src="personalizado.js"></script>
		
		

	</head>
	<body>
	<div class="containerfull">
		<div class="flexdisplayrow">
			<div class="container">
				<h1>Calendário de flores</h1>
			</div>
			<div class="flex-end"> 
				<a href="cadastroflor.php">
					<div class="divborder">
						<h2>Cadastrar flor</h2>
					</div>
				</a>
				<a href="cadastroabelha.php">
					<div class="divborder">
						<h2>Cadastrar abelha</h2>
					</div>
				</a>
			</div>
		</div>
		<div class="mgbottommedium">
			<h3>Neste calendário encontram-se diversas flores. <br>
				Podem ser agupada pelos meses que florescem e  <br>
				o pelo tipo de abelha que poliniza a flor. 
			</h3>
		</div>
		<form method="POST" id="form-pesquisa" action="">
			<div class="mgbottomsmall">
				<h3>
					Selecione as abelhas
				</h3>
			</div>
			
			<div class="setarfontnormal">
				<div class="setartamanhomaior">
							
					<div class="setartamanhomaior justificaritens mgbottommedium">
						
						<div class="setartamanhomaior">
							
							<select class="dropbox select2 form-control" id="idSelect2" name="nomeAbelha[]" multiple="" tabindex="-1" style="display: none;">
								<?php
									mysqli_select_db($link,$dbname) or die (mysql_error());
									$query = "SELECT nome FROM abelha"; 
									$result_query = mysqli_query($link, $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );

									$i=0;
									
									echo '<option value="'. i .'"</option>';
									while ($row = mysqli_fetch_array( $result_query )) 
									{ 	
										$i++;
										echo '<option value="'. $i . $row["nome"] . '">' . $row["nome"] . '</option>';	
									}
								?>
							</select>
							
						</div>
					</div>		
				</div>		
			</div>					
							




			
			<div class="mgbottomsmall">
				<h3>
					Escolha os meses
				</h3>
			</div>
			<div class = "divmeses mgbottombig">
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
			<div class="containerfull">
				<div class="divgeralimagens">
					<div class="divimagens mgbottombig">
					<?php
						mysqli_select_db($link,$dbname) or die (mysql_error());
						
						if(!(isset($_POST['nomeAbelha']))&&!(isset($_POST['meses']))){
							$query = "SELECT * FROM flor";
							$result_query = mysqli_query($link, $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );
							while($row = mysqli_fetch_array( $result_query )){
								echo '<div class="itemimagem_1 ajuste">';
								echo '<img src="uploads/'. $row["imagem"] .'">';
								echo '<h3 class="centralizarfont">'. $row["nome"] .'</h3>';
								echo '</div>';
							}
						}
					?>
					<script>
						
						//location.reload();
					</script>
					<?php
						if((isset($_POST['nomeAbelha']))&&!(isset($_POST['meses']))){
							$abelhas = $_POST['nomeAbelha'];
							for($i=0;i<count($abelhas);$i++){
								$query = "SELECT idFlor FROM poliniza where idAbelha=$abelhas[$i]";
								echo $query;
							}
							
						}

						
						$con1 = filter_input(INPUT_POST, 'palavra1', FILTER_SANITIZE_STRING);

						$con2 = filter_input(INPUT_POST, 'palavra2', FILTER_SANITIZE_STRING);
						echo $con2;
						if($con2 != '' && $con1 == ''){
							$query = "SELECT * FROM florescer where idMes = '$con1'";
							$result = mysqli_query($link, $query) or die(' Erro na query:' . $query . ' ' . mysql_error() );
							while($row = mysqli_fetch_array($result)){
								$var = $row['idFlor'];
								$query_sec = "SELECT * FROM flor where id = '$var'";
								$result2 = mysqli_query($link, $query_sec) or die(' Erro na query:' . $query_sec . ' ' . mysql_error() );
								while($row = mysqli_fetch_array( $result2 )){
									echo '<div class="itemimagem_1 ajuste">';
									echo '<img src="uploads/'. $row["imagem"] .'">';
									echo '<h3 class="centralizarfont">'. $row["nome"] .'</h3>';
									echo '</div>';
								}
							}
							
						}
						

							
					?>
					</div> 
				</div>
			</div>
		</form>
		<?php 
			
			mysqli_select_db($link,$dbname) or die (mysql_error());
			$query = "SELECT * FROM flor";
			$query2 = "SELECT a.nome FROM abelha a, poliniza p  WHERE a.id = p.idAbelha";
			$result_query = mysqli_query($link, $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );

			echo "<div id='modal-informacao' class='modal-info'>"; 
			echo "<div class='divtelinha'>";
			echo "<div class='divtelinhaimagem'>";
			echo "<button class='fechar'>x</button>";
			echo "<img src='uploads/Rectangle 75.png'>";
			echo "</div>";
			echo "<div class='modal'>";
			echo "<h1 class='mgbottomsmall'>Azaléia</h1>";
			echo "<h3 class='mgbottommedium'>A azálea ou azaleia é um arbusto de flores <br>classificadas no gênero dos rododendros, <br>existem azaleias de folhas caducas e azaleias <br>perenes.</h3>";
			echo "<h1 class='mgbottomsmall'>Abelhas</h1>";
			echo "<h3 class='mgbottommedium'>Jataí</h3>";	
			echo "<h1><a href='#'>Ver mais</a></h1>";	
			echo "</div>";
			echo "</div>";
			
			echo "</div>";
		?>
	</div>	
	<div class="divpospaginacao mgbottommedium">
		<ul class="pagination">
			<li><a href="#"><</a></li>
			<li><a class="active" href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li><a href="#">7</a></li>
			<li><a href="#">></a></li>
		</ul>
	</div>

	<script>

		$(".select2").select2();
		


		function iniciaModal(modalID){
			const modal = document.getElementById(modalID);
			modal.classList.add('mostrar');
			document.getElementsByClassName('modal-info')[0].addEventListener('click',(evento) => {
				console.log(evento.target.id);
				if(evento.target.id == modalID || event.target.className == "fechar"){
					modal.classList.remove('mostrar');
				}
			});
		}
		for(var i=1;i<=1;i++){
			document.getElementsByClassName('itemimagem_'+i)[0].addEventListener('click', function(){
				iniciaModal('modal-informacao');
		});

			
		}
		
		/*const imagem = document.querySelector('.itemimagem');
		imagem.addEventListener('click', function(){
			iniciaModal('modal-informacao');
		});*/

	</script>

	</body>
</html>

