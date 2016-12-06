<?php
include 'conecta.php';


if ($conexao) {
	$login=$_POST['login'];
	$senha=md5($_POST['senha']);
			
	$sql1=pg_query("SELECT * FROM usuario WHERE login='$login'AND senha = '$senha'");
	$row=pg_num_rows($sql1);
	
		
	if(get_magic_quotes_gpc() == 0){
		$login = addslashes($login);
		$senha = addslashes($senha);
	}
	
	if($row == 0){
		echo "<script>window.location='index.php';alert('Usuário e/ou Senha Inválidos')</script>";
					
	}
	$dados = pg_fetch_array ($sql1);
	if ($dados ["situacao"] != 'A'){
			echo "<script>window.location='index.php';alert('Usuário Inativo no sistema !!')</script>";
	}else{
		header ('location:principal.php'); 
		die();
	}
}
?>