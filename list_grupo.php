<?php
 session_start();
  include 'conecta.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>SIPI</title>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="bootstrap/css/style.css" rel="stylesheet">
<body> 
<?php
include 'menu.php';
?>
                  <div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Modal Header</h4>
		</div>
		<div class="modal-body">
		  <p>Some text in the modal.</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>

	</div>
</div>
<div class="content">
<?php
	include 'conecta.php';
	if($conexao != null){
		
		$sql = 
		"
			select id,nome from grupo order by id
		";
		$sql1="select p.tema from projeto p, grupo g where g.num_proj = p.numero";
		$result1= pg_query($conexao,$sql1);
		$result = pg_query($conexao,$sql);
		
		$rowss = pg_num_rows($result);
		$index = 0;
		
		if($result != null && $result != false && $rowss > 0){
			echo '<h1 color="#006295">Resultado da Consulta dos Grupos</h1>';			
			$dados = pg_fetch_array($result,$index,PGSQL_ASSOC);
			$dados1=pg_fetch_array($result1,$index,PGSQL_ASSOC);
			echo '<div class="table-responsive">';
			echo '<table class="table table-striped table-hover">';
			echo '<thead>';
			echo "<tr>";
	//		echo '<td>#</td>';
			echo "<td align=center valign=center>ID</td>";
			echo "<td align=center>Nome</td>";
			echo "<td align=center>Tema</td>";
			echo "<td align=center>Opções</td>";
			echo "</tr>";
			echo '</thead>';
			echo '<tbody>';
			while($index < $rowss){
				$dados = pg_fetch_array($result,$index,PGSQL_ASSOC);
				$dados1=pg_fetch_array($result1,$index,PGSQL_ASSOC);
				$tema = trim($dados1['tema']);
				$identEdit = trim($dados['id']);
				$identExclud = trim($dados['id']);
				$identTRow = $identEdit . $identExclud;
		//		echo "<tr id='$identTRow'>";
			//	echo "<th>$index</th>";
				echo "<td align=center><p>".$dados['id']."</p></td>";
				echo "<td align=center><p>".$dados['nome']."</p></td>";
				echo "<td align=center><p>".$dados1['tema']."</p></td>";				
				echo "<td align=center><a id='$identEdit' href='edit_grupo.php?id=$identEdit'><i class='glyphicon glyphicon-pencil'></i></a '> | <a id='$identExclud' href='del_grupo.php?id=$identExclud'><i class='glyphicon glyphicon-trash'></i></a></td>";
				echo "</tr>";
				echo "<br>";
				$index += 1;
			}
			echo '</tbody>';
			echo "</table>";
			echo '</div>';
		}else{
			echo '<p color="#FF1A00">Error: Não foi possível mostrar dados!!</p>';
		}
		
	}else{
		echo '<p color="#FF1A00">Error: Tentativa de conexão com banco de dados mal sucedida!!!</p>';
	}
?>
</div>
</br></br>
<button type="back" id="voltar" name="voltar" class="btn btn-warning" onClick="history.back()">Voltar</button>
<script src="/bootstrap/js/jquery.min.js"></script>
 <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>