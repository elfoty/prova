<?php
    include 'conecta.php';
    $msg = "";
    mysqli_select_db($link,$dbname) or die (mysql_error());
    //If upload button is clicked ...

    if ((isset($_POST['submit']))) {
    //Get image name
        $image = $_FILES['image']['name'];
        $nome = $_POST['nome'];
        $nomeCientifico = $_POST['nomeCientifico'];
        $descricao = $_POST['descricao'];
        $abelhas = $_POST['nomeAbelha'];
        $meses = $_POST['meses'];

    // Get text
        header("Location: cadastroflor.php");
    // image file directory
        $target = "uploads/".basename($image);

        $sql = "INSERT INTO flor (nome, nomeCientifico, descricao, imagem) VALUES ('$nome','$nomeCientifico','$descricao','$image')";
    // execute query
        mysqli_query($link, $sql);

    

        $con1 = "SELECT id FROM flor WHERE nome='$nome'";

        $idFlor = mysqli_query($link, $con1) or die(' Erro na query:' . $con1 . ' ' . mysql_error() );
        while ($row = mysqli_fetch_array( $idFlor )){ 	
			$var = $row["id"];
        }	

       for($i=1;$i<=12;$i++){
           if($meses[$i] != null){
                $sql3 = "INSERT INTO floresce (idMes, idFlor) VALUES ('$meses[$i]','$var')";
                mysqli_query($link, $sql3);
           }
       }

        
        for ($i=0; $i < count($abelhas); $i++){
            echo $abelhas[$i];
            $sql2 = "INSERT INTO poliniza (idFlor, idAbelha) VALUES ('$var','$abelhas[$i]')";
            mysqli_query($link, $sql2);
        }

          /*  
            foreach($abelhas as $abelha){
                echo 1;
                $sql2 = "INSERT INTO poliniza (idFlor, idAbelha) VALUES ('$con1','$abelha')";
                echo $sql2;
                mysqli_query($link, $sql2);
            }*/
        

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    }
?>