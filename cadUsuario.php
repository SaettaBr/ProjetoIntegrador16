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
									echo "<script>window.location='form_cad_usuario.php';alert('Cadastro realizado com sucesso!')</script>";
                                    } else {
                               		echo "<script>window.location='form_cad_usuario.php';alert('Já exite um usuário cadastrado com esse login. Tente novamente!')</script>";
                                   }
                                } else {
                                   echo "<script>window.location='form_cad_usuario.php';alert('A situação não foi selecionada!')</script>";
                                }
                              } else {
                        		echo "<script>window.location='form_cad_usuario.php';alert('O nome não foi informado!')</script>";
							  }
                } else {
                   echo "<script>window.location='form_cad_usuario.php';alert('>As senhas não conferem!')</script>";
                }
            } else {
               echo "<script>window.location='form_cad_usuario.php';alert('A senha não foi informada!')</script>";
            }
        } else {
        echo "<script>window.location='form_cad_usuario.php';alert('O login não foi informado!')</script>";
        }
    } else {
		echo "<script>window.location='form_cad_usuario.php';alert('Falha na conexão com o banco de dados!')</script>";

    }
    
	}
	pg_close($conexao);
    ?>