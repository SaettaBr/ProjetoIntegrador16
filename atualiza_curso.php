<?php
    
	include 'conecta.php';
	
    if ($conexao) {
        $numero=$_POST['numero'];
        $nome=$_POST['nome'];
        $sigla=$_POST['sigla'];
        
		$sql1="SELECT * FROM curso WHERE numero='$numero'";
        $sql2="UPDATE curso SET numero='$numero',nome = '$nome', sigla = '$sigla' WHERE numero = '$numero'";
	   $result1 = pg_query($conexao, $sql1);
	   
	if ($numero != ""){
		if ($nome != "") {
			if($sigla != ""){
					pg_query($conexao, $sql2);
					echo "<script>window.location='list_curso.php';alert('Cadastro realizado com sucesso!')</script>";
					}else{
					echo "<script>window.location='list_curso.php';alert('A sigla do curso não foi informada!')</script>";
			}
		}else{
		echo "<script>window.location='list_curso.php';alert('O nome não foi informado!')</script>";
		}
	}else{
		echo "<script>window.location='list_curso.php';alert('O numero não foi informado!')</script>";
	}
}
	
	
?>

