<?php

     include 'conecta.php';
     
     if ($conexao) {
          $id=$_POST['id'];
          $nome=$_POST['nome'];
          $integ01=$_POST['integ01'];
          $integ02=$_POST['integ02'];
          $integ03=$_POST['integ03'];
          $integ04=$_POST['integ04'];
          $projeto=$_POST['projeto'];
          $sql0="(SELECT * FROM grupo WHERE id='$id')";
          $result0=pg_exec($conexao, $sql0);
          
		$sql6="(SELECT * FROM projeto WHERE numero='$projeto')";
		$dados=pg_query($conexao, $sql6);
		$linha=pg_fetch_array($dados);
		  
          if (pg_num_rows($result0) == 0) {
			  if ($id != "") {
				if ($nome != "") {			   
			       if ($projeto != "") {
			   	   		if ($integ01 != "") {
							$sql1="INSERT INTO grupo (id, nome, num_proj) VALUES ('".$id."', '".$nome."', '".$projeto."')";
				   			pg_query($conexao, $sql1);
							$sql2="INSERT INTO participa (matricula, id_grupo) VALUES ('".$integ01."', '".$id."')";
							pg_query($conexao, $sql2);
								if ($integ02 != "") {
								$sql3="INSERT INTO participa (matricula, id_grupo) VALUES ('".$integ02."', '".$id."')";
								pg_query($conexao, $sql3);
							   if ($integ03 != "") {
									$sql4="INSERT INTO participa (matricula, id_grupo) VALUES ('".$integ03."', '".$id."')";
									pg_query($conexao, $sql4);
								   if ($integ04 != "") {
										$sql5="INSERT INTO participa (matricula, id_grupo) VALUES ('".$integ04."', '".$id."')";
										pg_query($conexao, $sql5);
									}		
							   }
							}
						}else{
						echo "<script>window.location='form_cad_grupo.php';alert('Aluno não informado !')</script>";
						}
						echo "<script>window.location='form_cad_grupo.php';alert('Cadastro realizado com sucesso !')</script>";
					 }else{
				  echo "<script>window.location='form_cad_grupo.php';alert('O projeto não foi informado.')</script>";
				  }
			 }else{
				echo "<script>window.location='form_cad_grupo.php';alert('O nome não foi informado.')</script>";
			  }
		}else{
		 echo "<script>window.location='form_cad_grupo.php';alert(O ID não foi informada.')</script>";
		  }
	}else{
		echo "<script>window.location='form_cad_grupo.php';alert('Já existe um grupo cadastrado com esse ID.')</script>";
	 }
 }else{
  echo "<script>window.location='form_cad_grupo.php';alert('Falha na conexão com o banco de dados.')</script>";
 }

		 echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
		 <div class='form-group'><div class='col-md-12'><a href='cadGrupo.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
	   
     pg_close($conexao);
?>