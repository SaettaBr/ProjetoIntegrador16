<?php
    
	include 'conecta.php';
	
    if ($conexao) {
        $codigo=$_POST['codigo'];
        $nome=$_POST['nome'];
        $ch=$_POST['ch'];
        
		$sql1="SELECT * FROM disciplina WHERE codigo='$codigo'";
      $sql2="UPDATE disciplina SET codigo='$codigo', nome = '$nome', ch = '$ch' WHERE codigo = '$codigo'";
	   
	   $result1 = pg_query($conexao, $sql1);
		if ($codigo != ""){
		if ($nome != "") {
			if($ch != ""){
					pg_query($conexao, $sql2);
					echo "<script>window.location='list_disciplina.php';alert('Cadastro realizado com sucesso!')</script>";
			}else{
				echo "<script>window.location='list_disciplina.php';alert('A carga horária da disciplina não foi informada!')</script>";
				}
		}else{
			echo "<script>window.location='list_disciplina.php';alert('O nome não foi informado!')</script>";
			}
	}else{
		echo "<script>window.location='list_disciplina.php';alert('O código da disciplina não foi informado!')</script>";
		}
	}
	
	pg_close($conexao);
?>

