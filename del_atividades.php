<?php

     include 'conecta.php';
	  
     if($conexao){
      $identExclud=$_GET['num'];
	   $identdisc=$_GET['disc'];
     $sql="DELETE FROM composto WHERE num_proj = '$identExclud' and cod_disc = $identdisc";
	$result=pg_query($sql);
	$linhas=pg_affected_rows($result);
	if($linhas == 1){
		echo "<script>window.location='list_atividades.php';alert('Projeto excluído com Sucesso !')</script>";
	}else{
		echo "<script>window.location='list_atividades.php';alert('Projeto não encontrado !')</script>";
	}
	
	}
	pg_close($conexao);
?>