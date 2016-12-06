<?php

     include 'conecta.php';
	  
     if($conexao){
      $identExclud=$_GET['num'];
     $sql="DELETE FROM projeto WHERE numero = '$identExclud'";
	$result=pg_query($sql);
	$linhas=pg_affected_rows($result);
	if($linhas == 1){
		echo "<script>window.location='list_projeto.php';alert('Projeto excluído com Sucesso !')</script>";
	}else{
		echo "<script>window.location='list_projeto.php';alert('Projeto não encontrado !')</script>";
	}
	
	}
	pg_close($conexao);
?>