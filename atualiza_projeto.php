<?php
    include 'conecta.php';
    
    if ($conexao) {
		$numero=$_POST['numero'];
        $ano=$_POST['ano'];
        $semestre=$_POST['semestre'];
        $modulo=$_POST['modulo'];
        $dt_inicio=$_POST['dt_inicio'];
        $dt_termino=$_POST['dt_termino'];
		$tema=$_POST['tema'];
        $descricao=$_POST['descricao'];
		$curso=$_POST['curso']; 
			
		$sql1="SELECT * FROM projeto where ano='$ano' and semestre='$semestre' and modulo='$modulo'" ;
        
		$sql2="UPDATE projeto SET ano= '$ano', semestre='$semestre', modulo='$modulo', dt_inicio='$dt_inicio', dt_termino='$dt_termino', tema='$tema', descricao='$descricao', num_curso='$curso' where numero='$numero'";
		
		
		$sql3="SELECT * FROM curso WHERE numero='$curso'";
		$dados=pg_query($conexao, $sql3);
		$linha=pg_fetch_array($dados);
   
   $result1=pg_query($conexao, $sql1);
   		
		if ($ano != ""){
            if ($semestre != "") {
                if ($modulo != "") {
                    if ($dt_inicio != "") {
                        if ($dt_termino != "") {
                            if ($tema != "") {
								if($descricao != "") {
									if($curso != "") {
										if (pg_num_rows($result1) != 0){
											pg_query($conexao, $sql2);
													echo "<script>window.location='list_projeto.php';alert('Cadastro realizado com sucesso!')</script>";
										} else {
											echo "<script>window.location='list_projeto.php';alert('Já exite um projeto cadastrado para o módulo ".$modulo." de ".$linha['sigla']." neste semestre.')</script>";
										}
									}else{
										 echo "<script>window.location='list_projeto.php';alert('O curso não foi informado.')</script>";
									}
								}else{
									 echo "<script>window.location='list_projeto.php';alert('A descrição não foi informada.')</script>";
								}			
                            } else {
								echo "<script>window.location='list_projeto.php';alert('O tema não foi informado.')</script>";
                            }
                        } else {
							echo "<script>window.location='list_projeto.php';alert('A data de término não foi informada.')</script>";
                        }
                    } else {
						echo "<script>window.location='list_projeto.php';alert('A data de início não foi informada.')</script>";
                    }
                } else {
					echo "<script>window.location='list_projeto.php';alert('O módulo não foi informado.')</script>";
                }
            } else {
				echo "<script>window.location='list_projeto.php';alert('O semestre não foi informado.')</script>";
            }
        } else {
			echo "<script>window.location='list_projeto.php';alert('O ano não foi informado.')</script>";
        }
    } else {
		echo "<script>window.location='list_projeto.php';alert('Falha na conexão com o banco de dados.')</script>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='cadProjeto.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);

?>