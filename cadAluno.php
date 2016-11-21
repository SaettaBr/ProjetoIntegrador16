<?php
    
	include 'conecta.php';
	
    if ($conexao) {
        $matricula=$_POST['matricula'];
        $nome=$_POST['nome'];
        $sexo=$_POST['sexo'];
        $dtNasc=$_POST['dtNasc'];
		$cidade=$_POST['cidade'];
		$uf=$_POST['uf'];
	
		$sql1="SELECT * FROM aluno WHERE matricula='$matricula'";
        $sql2="INSERT INTO aluno VALUES ('".$matricula."', '".$nome."', '".$sexo."', '".$dtNasc."', '".$cidade."', '".$uf."')";
      
	   
	   $result1 = pg_query($conexao, $sql1);
	   
	if ($matricula != ""){
		if ($nome != "") {
			if($sexo != ""){
				if($dtNasc != ""){
					if($cidade != ""){
						if($uf != ""){
							if (pg_num_rows($result1) == 0) {		
								pg_query($conexao, $sql2);
									echo "<script>window.location='form_cad_usuario.php';alert('Usuário cadastrado no sistema !!');</script>";		
							}else{								
								echo "<script>window.location='form_cad_usuario.php';alert('Matricula já cadastrada!!');</script>";
							}
						}else{
							echo "<script>window.location='form_cad_usuario.php';alert('UF não informado!!');</script>";
						}
					}else{
						echo "<script>window.location='form_cad_usuario.php';alert('Cidade não informada!!');</script>";
					}
				}else{
					echo "<script>window.location='form_cad_usuario.php';alert('Data nascimento não informado!!');</script>";
				}
			}else{
				echo "<script>window.location='form_cad_usuario.php';alert('sexo não informado!!');</script>";		
			}
		}else{
			echo "<script>window.location='form_cad_usuario.php';alert('Usuário cadastrado no sistema !!');</script>";		
	}
		}
	}
		
?>
