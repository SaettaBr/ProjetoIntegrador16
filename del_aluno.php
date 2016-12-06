<?php

     include 'conecta.php';
	  
     if($conexao){
    $matricula=$_GET['mat']; 
     $sql="DELETE FROM aluno WHERE matricula = '$matricula'";
	$result=pg_query($sql);
	$linhas=pg_affected_rows($result);
	if($linhas == 1){
		echo "<script>window.location='list_aluno.php';alert('Aluno excluído com Sucesso !')</script>";
	}else{
		echo "<script>window.location='list_aluno.php';alert('Aluno não encontrado !')</script>";
	}
	
	}
	pg_close($conexao);
?>