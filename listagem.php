
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