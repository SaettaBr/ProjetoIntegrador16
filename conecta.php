<?php
    $host="localhost";
    $dbname="projetointegrador";
    $port="5432";
    $user="postgres";
    $pssword="senac123";
    
    $conexao=pg_connect("host=$host dbname=$dbname port=$port user=$user password=$pssword");
	
?>