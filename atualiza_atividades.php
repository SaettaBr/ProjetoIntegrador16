<?php
    include 'conecta.php';
    
    if ($conexao) {
        $projeto=$_POST['projeto'];
        $disciplina=$_POST['disciplina'];
        $descricao=$_POST['descricao'];
			
		$sql1="SELECT * FROM composto where num_proj='$projeto' and cod_disc='$disciplina'" ;
        
			$sql2="UPDATE composto SET desc_atividade='$descricao' where num_proj='$projeto' and cod_disc='$disciplina'";
		
				
		$sql3="SELECT * FROM projeto WHERE numero='$projeto'";
		$dados=pg_query($conexao, $sql3);
		$linha=pg_fetch_array($dados);
   
   $sql4="SELECT * FROM disciplina WHERE codigo='$disciplina'";
		$dados4=pg_query($conexao, $sql4);
		$linha=pg_fetch_array($dados4);
   
   $result1=pg_query($conexao, $sql1);
   		
			
		if ($projeto != ""){
            if ($disciplina != "") {
                if($descricao != "") {
					if (pg_num_rows($result1) != 0){
					pg_query($conexao, $sql2);
	/*				echo "<script>window.location='list_atividades.php';alert('Cadastro realizado com sucesso!')</script>";
					}
				}else{
					echo "<script>window.location='list_atividades.php';alert('A descrição não foi informada.')</script>";
				}
			}else{
				echo "<script>window.location='list_atividades.php';alert('A disciplina não foi informada.')</script>";
			}			
        } else {
			echo "<script>window.location='list_atividades.php';alert('O projeto não foi informado.')</script>";
        }
        
    } else {
		echo "<script>window.location='list_atividades.php';alert('Falha na conexão com o banco de dados.')</script>";
    }
	  */
	  }
	  }
	  }
	  }
	   } 	
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadProjeto.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
?>