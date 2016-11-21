<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>SIPI</title>

 <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="/bootstrap/css/style.css" rel="stylesheet">
</head>
<body> 
<nav class="navbar navbar-inverse navbar-fixed-top">
 <div class="container-fluid">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="index.php">SIPI</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
      <li><a href="lougout.php">Sair</a></li>
   </ul>
  </div>
 </div>
</nav>
<br/>
<br/>
<br/>

<?php
	include 'conecta.php';
	
	if($conexao){
	$lista=$_POST['enviar'];	
		if ($lista == 1){
			$sql = pg_query ("SELECT * from aluno order by nome");
			 while ($linha = pg_fetch_assoc($sql)){
				 echo "<table border 1>";				 				 
				 echo "<tr>";
				 echo "<td><th> Matricula: </td></th>";
				 echo "<td><th>".$linha ["matricula"]."</td></th>";
				 echo "<th> Nome: </th>";
				 echo "<th>".$linha ["nome"]."</th>";
				 echo "<th> Sexo: </th>";
				 echo "<th>".$linha ["sexo"]."</th>";
				 echo "<th> Data de Nascimento: </th>";
				 echo "<th>".$linha ["dtnasc"]."</th>";
				 echo "<th> Cidade: </th>";
				 echo "<th>".$linha ["cidade"]."</th>";
				 echo "<th> UF: </th>";
				 echo "<th>".$linha ["uf"]."</th>";
				 echo "</tr>";
 				 foreach((array)$sql as $value){
					echo "<tr>";
					foreach((array)$value as $key => $sql){
						if($sql == "M"){
							echo "<th>Masculino</th>";
						}elseif($sql == "F"){
							echo "<th>Feminino</th>";
						}else echo "<th>$res</th>"; 
					}
					echo "</tr>";
				 }
				 echo "</table>";
			 }
		}else{
			 $sql = pg_query ("SELECT * from aluno order by matricula");
			 while ($linha = pg_fetch_assoc($sql)){
				 echo "<table border 1>";				 				 
				 echo "<tr>";
				 echo "<td> Matricula: </td>";
				 echo "<th>".$linha ["matricula"]."</th>";
				 echo "<th> Nome: </th>";
				 echo "<th>".$linha ["nome"]."</th>";
				 echo "<th> Sexo: </th>";
				 echo "<th>".$linha ["sexo"]."</th>";
				 echo "<th> Data de Nascimento: </th>";
				 echo "<th>".$linha ["dtnasc"]."</th>";
				 echo "<th> Cidade: </th>";
				 echo "<th>".$linha ["cidade"]."</th>";
				 echo "<th> UF: </th>";
				 echo "<th>".$linha ["uf"]."</th>";
				 echo "</tr>";
 				 foreach((array)$sql as $value){
					echo "<tr>";
					foreach((array)$value as $key => $res){
						if($res == "M"){
							echo "<th>Masculino</th>";
						}elseif($res == "F"){
							echo "<th>Feminino</th>";
						}else echo "<th>$res</th>"; 
					}
					echo "</tr>";
				 }
				 echo "</table>";
			 }
		}
	}
?>
</br></br>
<input type="button" value="Voltar" a href="#" onClick="history.back();">