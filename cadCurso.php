<?php
    
	include 'conecta.php';
	
    if ($conexao) {
        $numero=$_POST['numero'];
        $nome=$_POST['nome'];
        $sigla=$_POST['sigla'];
        
		$sql1="SELECT * FROM curso WHERE numero='$numero'";
        $sql2="INSERT INTO curso VALUES ('".$numero."', '".$nome."', '".$sigla."')";
      
	   
	   $result1 = pg_query($conexao, $sql1);
	   
	if ($numero != ""){
		if ($nome != "") {
			if($sigla != ""){
				if (pg_num_rows($result1) == 0) {		
					pg_query($conexao, $sql2);
					echo "<br><br><h3>Cadastro realizado com sucesso!</h3>";
					}else{								
						echo "<br><br><h3>Número do curso já cadastrado!</h3>";
						}
					}else{
				echo "<br><br><h3>A sigla do curso não foi informada!</h3>";
			}
		}else{
			echo "<br><br><h3>O nome não foi informado!</h3>";
		}
	}else{
		echo "<br><br><h3>O numero não foi informado!</h3>";
	}
}
	
	
?>

