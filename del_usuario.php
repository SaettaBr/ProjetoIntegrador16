<?php

     include 'conecta.php';
	  
     if($conexao){
     $identEdit=$_GET['log'];
     $sql="DELETE FROM usuario WHERE login = '$identEdit'";
	$result=pg_query($sql);
	$linhas=pg_affected_rows($result);
	if($linhas == 1){
		echo "<script>window.location='list_usuario.php';alert('Usuário excluído com Sucesso !')</script>";
	}else{
		echo "<script>window.location='list_usuario.php';alert('Usuário não encontrado !')</script>";
	}
	
	}
	pg_close($conexao);
?>