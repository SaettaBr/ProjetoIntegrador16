<?php
    include 'conecta.php';
    
    if ($conexao) {
        $login=$_POST['login'];
        $senha=$_POST['senha'];
        $sql="SELECT * FROM usuario WHERE login='$login' AND senha=md5('$senha')";
        $result = pg_exec($conexao, $sql);
        $consulta = pg_fetch_array($result);
        
        if ($login != "senac" && $senha != "senac123"){
            if (pg_num_rows($result) > 0) {
                setcookie("nome_usuario", $consulta['nome']);
                setcookie("login_usuário", $consulta['login']);
                header('Location: pagina_inicial.php');
            } else {
                echo "<h3>Erro ao se logar.</h3>";
            }
        } else {
            echo "<h3>Dados de acesso não informados.</h3>";
        }
    } else {
        echo "<h3>Falha na conexão com o banco de dados!</h3>";
    }
    include '../../Documents/Marcos/Senac/Trabalhos de Faculdade/Elias/cookie/voltarLogin.html';
?>