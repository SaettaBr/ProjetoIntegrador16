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
										echo "<script>window.location='form_cad_usuario.php';alert('Usuário cadastrado com sucesso !!');</script>";		
										} else {
											echo "<script>window.location='form_cad_usuario.php';alert('Usuário já cadastrado!!');</script>";
										}
										}else
											echo "<script>window.location='form_cad_usuario.php';alert('Situação não informada!!');</script>";
										}
											else {
												echo "<script>window.location='form_cad_usuario.php';alert('Nome não informado!!');</script>";
												}
												}else {
                    								echo "<h3><script>window.location='form_cad_usuario.php';alert('Senhas não conferem!!');</script></h3>";
													}
													}else {
														echo "<h3><script>window.location='form_cad_usuario.php';alert('Senha não informada!!');</script></h3>";
														}
														}else {
                                							echo "<h3><script>window.location='form_cad_usuario.php';alert('Login não informado!!');</script></h3>";
															}
															}else {
																echo "<h3><script>window.location='form_cad_usuario.php';alert('Falha conexão com Banco de Dados!!');</script></h3>";
																}
							}
							?>