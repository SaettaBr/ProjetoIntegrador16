<?php
    
	include 'conecta.php';
	
    if ($conexao) {
        $login=$_POST['login'];
        $senha=md5($_POST['senha']);
        $confirmacao=md5($_POST['confirmacao']);
        $nome=$_POST['nome'];
        $categoria=$_POST['categoria'];
        $situacao=$_POST['situacao'];
	
	
		
        $sql1="SELECT * FROM usuario WHERE login='$login'";
        $sql2="INSERT INTO usuario VALUES ('".$login."', '".$senha."', '".$nome."', '".$categoria."', '".$situacao."')";
       
        $result1 = pg_query($conexao, $sql1);
        
      if ($login != "") {
            if ($_POST['senha'] != ""){
                if ($senha == $confirmacao){
                    if ($nome != "") {
						if ($categoria != "") {
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

