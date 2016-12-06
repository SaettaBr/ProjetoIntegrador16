<?php
include 'conecta.php';

if($conexao){
	$identEdit=$_GET['num'];
	$sql = "DELETE FROM curso WHERE numero ='$identEdit'";
	$result=pg_query($sql);
	$linhas=pg_affected_rows($result);
	if($linhas == 1){
		echo "<script>window.location='list_curso.php';alert('Curso excluído com Sucesso !')</script>";
	}else{
		echo "<script>window.location='list_curso.php';alert('Curso não encontrado !')</script>";
	}
	
	}
?>
