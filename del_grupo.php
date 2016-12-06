<?php

     include 'conecta.php';
	  
     if($conexao){
     $identExclud=$_GET['id'];
     $sql="DELETE FROM participa WHERE id_grupo = '$identExclud'";
	 $sql1="DELETE FROM grupo WHERE id = '$identExclud'";
	$result=pg_query($sql);
	$result=pg_query($sql1);
	$linhas=pg_affected_rows($result);
	if($linhas == 1){
		echo "<script>window.location='list_grupo.php';alert('Grupo excluído com Sucesso !')</script>";
	}else{
		echo "<script>window.location='list_grupo.php';alert('Grupo não encontrado !')</script>";
	}
	
	}
	pg_close($conexao);
?>

