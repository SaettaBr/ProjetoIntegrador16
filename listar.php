<?php
    
	include 'conecta.php';
	
    if ($conexao) {
        $listar=$_PUSH['login'];
        $alterar=$_POST['alterar'];
        $excluir=$_POST['excluir'];
        $situacao=$_POST['situacao'];
	
	
		
		$sql1="SELECT * FROM aluno WHERE nome='$nome'";
      //$sql2="INSERT INTO usuario VALUES ('".$login."', '".$senha."', '".$alterar."', '".$excluir."', '".$situacao."')";
       
        $result1 = pg_query($conexao, $sql1);
        
      if ($value != "") {
            if ($_POST['senha'] != ""){
                if ($value == $confirmacao){
                    if ($alterar != "") {
						if ($excluir != "") {
							if ($situacao != ""){
								if (pg_num_rows($result1) == 0) {		
									pg_query($conexao, $sql2);
									echo "<br><br><h3>Cadastro realizado com sucesso!</h3>";
                                    } else {
                                 echo "<br><br><h3>Já exite um usuário cadastrado com esse login. Tente novamente!</h3>";
                                   }
                                } else {
                                    echo "<br><br><h3>A situação não foi selecionada!</h3>";
                                }
                              } else {
                        		echo "<br><br><h3>O nome não foi informado!</h3>";
							  }
                } else {
                    echo "<br><br><h3>As senhas não conferem!</h3>";
                }
            } else {
                echo "<br><br><h3>A senha não foi informada!</h3>";
            }
        } else {
            echo "<br><br><h3>O login não foi informado!</h3>";
        }
    } else {
        echo "<br><br><h3>Falha na conexão com o banco de dados!</h3>";
    }
    
	}
?>

