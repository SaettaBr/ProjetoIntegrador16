<?php
session_start();
include 'conecta.php';
	
	if($conexao){
		$login=$_POST['login'];
		$senha=md5($_POST['senha']); 
		$sql="select login, senha from usuario WHERE login='$login' and senha='$senha'";
		$result = pg_query($conexao,$sql);
		$rowss = pg_num_rows($result); 
		$dados=pg_fetch_array($result);
		if($rowss > 0 ){
				
				$_SESSION['login'] = $dados["login"];
				$_SESSION['senha'] = $dados["senha"];
				header('location:principal.php');
				}
	
	}
		?>