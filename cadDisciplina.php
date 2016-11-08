<?php
    
	include 'conecta.php';
	
    if ($conexao) {
        $codigo=$_POST['codigo'];
        $nome=$_POST['nome'];
        $ch=$_POST['ch'];
        
		$sql1="SELECT * FROM disciplina WHERE codigo='$codigo'";
        $sql2="INSERT INTO disciplina VALUES ('".$codigo."', '".$nome."', '".$ch."')";
      
	   
	   $result1 = pg_query($conexao, $sql1);
	   
	if ($codigo != ""){
		if ($nome != "") {
			if($ch != ""){
				if (pg_num_rows($result1) == 0) {		
					pg_query($conexao, $sql2);
					echo "<br><br><h3>Cadastro realizado com sucesso!</h3>";
					}else{								
						echo "<br><br><h3>Código da disciplina já cadastrada!</h3>";
						}
					}else{
				echo "<br><br><h3>A carga horária da disciplina não foi informada!</h3>";
			}
		}else{
			echo "<br><br><h3>O nome não foi informado!</h3>";
		}
	}else{
		echo "<br><br><h3>O codigo não foi informado!</h3>";
	}
}
	
	
?>

