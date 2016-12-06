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
					echo "<script>window.location='form_cad_disciplina.php';alert('Cadastro realizado com sucesso!')</script>";
					}else{								
						echo "<script>window.location='form_cad_disciplina.php';alert('Código da disciplina já cadastrada!')</script>";
						}
					}else{
				echo "<script>window.location='form_cad_disciplina.php';alert('A carga horária da disciplina não foi informada!')</script>";
			}
		}else{
			echo "<script>window.location='form_cad_disciplina.php';alert('O nome não foi informado!')</script>";
		}
	}else{
		echo "<script>window.location='form_cad_disciplina.php';alert('O codigo não foi informado!')</script>";
	}
}
	
	
?>

