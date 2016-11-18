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
								echo "<br><br><h3>Cadastro realizado com sucesso!</h3>";
							}else{								
								echo "<br><br><h3>Matrícula já cadastrada!</h3>";
							}
						}else{
							echo "<br><br><h3>A UF (Unidade Ferativa) não foi informada!</h3>";
						}
					}else{
						echo "<br><br><h3>A cidade não foi informada!</h3>";
					}
				}else{
					echo "<br><br><h3>A data de nascimento não foi informada!</h3>";
				}
			}else{
				echo "<br><br><h3>O sexo não foi selecionada!</h3>";
			}
		}else{
			echo "<br><br><h3>O nome não foi informado!</h3>";
		}
	}
}
	
?>
