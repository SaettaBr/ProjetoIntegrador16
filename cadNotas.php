<?php
     include 'conecta.php';
    

	if ($conexao) {
			$qtdNotas = 1;
			$qtdNotas = isset($_POST['nota2']) ? 2 : $qtdNotas;
			$qtdNotas = isset($_POST['nota3']) ? 3 : $qtdNotas;
			$qtdNotas = isset($_POST['nota4']) ? 4 : $qtdNotas;

			while($qtdNotas>0){
          		$nota=$_POST['nota'.$qtdNotas];
			   	$mat = $_POST['mat'.$qtdNotas];
   			   	$grupo = $_POST['grupo'.$qtdNotas];
			   	$sql = "UPDATE participa SET nota = '$nota' where matricula = '$mat' and id_grupo = $grupo";
			   	$result1=pg_query($sql);
				$qtdNotas--;
		 	}
			echo "<script>window.location='notas.php';alert('Cadastro realizado com sucesso!')</script>";
	}
	
     echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
     <div class='form-group'><div class='col-md-12'><a href='cadNotas.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
     
     pg_close($conexao);
?>