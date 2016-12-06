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
        $sql2="UPDATE usuario SET login='$login', senha='$senha', nome='$nome', categoria ='$categoria', situacao='$situacao' where login='$login'";
	    $result1 = pg_query($conexao, $sql1);
        
      if ($login != "") {
            if ($senha != ""){
                if ($senha == $confirmacao){
                    if ($nome != "") {
						if ($categoria != "") {
							if ($situacao != ""){
									pg_query($conexao, $sql2);
									echo "<script>window.location='list_usuario.php';alert('Cadastro realizado com sucesso!')</script>";
                             } else {
                                   echo "<script>window.location='list_usuario.php';alert('A situação não foi selecionada!')</script>";
                                }
                              } else {
                        		echo "<script>window.location='list_usuario.php';alert('O nome não foi informado!')</script>";
							  }
                } else {
                   echo "<script>window.location='list_usuario.php';alert('>As senhas não conferem!')</script>";
                }
            } else {
               echo "<script>window.location='list_usuario.php';alert('A senha não foi informada!')</script>";
            }
        } else {
        echo "<script>window.location='list_usuario.php';alert('O login não foi informado!')</script>";
        }
    } else {
		echo "<script>window.location='list_usuario.php';alert('Falha na conexão com o banco de dados!')</script>";

    }
    
	}
	 echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='listAluno.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);
    ?>



