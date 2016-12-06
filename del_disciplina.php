<?php

     include 'conecta.php';
	  
     if($conexao){
      $identEdit=$_GET['cod'];
     $sql="DELETE FROM disciplina WHERE codigo = '$identEdit'";
	$result=pg_query($sql);
	$linhas=pg_affected_rows($result);
	if($linhas == 1){
		echo "<script>window.location='list_disciplina.php';alert('Disciplina excluído com Sucesso !')</script>";
	}else{
		echo "<script>window.location='list_disciplina.php';alert('Disciplina não encontrado !')</script>";
	}
	
	}
	pg_close($conexao);
?>