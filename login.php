<?php
    session_start();
	include 'conecta.php';
	$login=$_POST['login'];
    $senha=$_POST['senha'];
	
    if ($conexao) {
       	$sql="SELECT * FROM usuario WHERE login='$login' AND senha=md5('$senha')";
        $result=pg_query($conexao, $sql);
        $dados = pg_fetch_array($result);
        if ($login != "" && $senha != ""){
            if (pg_num_rows($result) > 0) {
                if ($dados['situacao'] == 'a' || 'A') {
                    $_SESSION['login'] = $login;
                    $_SESSION['nome'] = $dados['nome'];
                    $_SESSION['categoria'] = $dados['categoria'];
                    $_SESSION['situacao'] = $dados['situacao'];
                    header('location:principal.php');
                } else {
                    unset ($_SESSION['login']);
                    unset ($_SESSION['senha']);
                    echo "<script>window.location='index.php';alert('O usuário não está ativo.')</script>";
                }
            } else {
                unset ($_SESSION['login']);
                unset ($_SESSION['senha']);
                echo "<script>window.location='index.php';alert('Login ou senha inválidos.')</script>";
            }
        } else {
            echo "<script>window.location='index.php';alert('Dados de acesso não informados.')</script>";
        }
    } else {
        echo "<script>window.location='index.php';alert('Falha na conexão com o banco de dados!')</script>";
    }
    
    echo "<link href='css/bootstrap.min.css' rel='stylesheet'><link href='css/style.css' rel='stylesheet'><div class='container droppedHover text-center'>
    <div class='form-group'><div class='col-md-12'><a href='index.php' class='btn btn-lg btn-primary'>Voltar</a></div></div></div>";
    
    pg_close($conexao);

?>