<?php

    include('conecta.php');

    $con1 = filter_input(INPUT_POST, 'palavra1', FILTER_SANITIZE_STRING);

    $con2 = filter_input(INPUT_POST, 'palavra2', FILTER_SANITIZE_STRING);
    $result2 = ''; 
    if($con2 != '' && $con1 == ''){
        $query = "SELECT * FROM florescer where idMes = '$con1'";
        $result = mysqli_query($link, $query) or die(' Erro na query:' . $query . ' ' . mysql_error() );
        while($row = mysqli_fetch_array($result)){
            $var = $row['idFlor'];
            $query_sec = "SELECT * FROM flor where id = '$var'";
            $result2 = mysqli_query($link, $query_sec) or die(' Erro na query:' . $query_sec . ' ' . mysql_error() );
        }
    }



?>