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
		
		$sql = "select login, senha, nome, categoria, situacao from usuario";
		
		$result = pg_query($conexao,$sql);
		
		$rowss = pg_num_rows($result);
		$index = 0;
		
		if($result != null && $result != false && $rowss > 0){
			echo '<h1 color="#006295">Resultado da Consulta dos Usuários</h1>';			
			$dados = pg_fetch_array($result,$index,PGSQL_ASSOC);
			echo '<div class="table-responsive">';
			echo '<table class="table table-striped table-hover">';
			echo '<thead>';
			echo "<tr>";
	//		echo '<td>#</td>';
			echo "<td align=center valign=centerLogin</td>";
			echo "<td align=center>Senha</td>";
			echo "<td align=center>Nome</td>";
			echo "<td align=center>Categoria</td>";
			echo "<td align=center>Situação</td>";
			echo "</tr>";
			echo '</thead>';
			echo '<tbody>';
			while($index < $rowss){
				$dados = pg_fetch_array($result,$index,PGSQL_ASSOC);
				$categoria = (($dados['categoria'] == 'G') ? 'Gerente' : (($dados['categoria'] == 'g') ? 'Gerente' :(($dados['categoria'] == 'P') ? 'Professor' : (($dados['categoria'] == 'p') ? 'Professor' :'Coordenador')))); 
				$situacao = (($dados['situacao'] == 'A' || 'a') ? 'Ativo' : 'Inativo'); 
				$identEdit = trim($dados['login']);
				$identExclud = trim($dados['login']);
				$identTRow = $identEdit . $identExclud;
//				echo "<tr id='$identTRow'>";
//				echo "<th>$index</th>";
				echo "<td align=center><p>".$dados['login']."</p></td>";
				echo "<td align=center><p>".$dados['senha']."</p></td>";
				echo "<td align=center><p>".$dados['nome']."</p></td>";
				echo "<td align=center><p>".$categoria."</p></td>";
				echo "<td align=center><p>".$situacao."</p></td>";
				echo "<td align=center>";
				if (strtoupper($_SESSION['categoria']) == 'C'){
				echo "<a id='$identEdit' 
				href='edit_usuario.php?log=$identEdit'><i class='glyphicon glyphicon-pencil'></i></a '> | <a id='$identExclud' href='del_usuario.php?log=$identExclud'><i class='glyphicon glyphicon-trash'></i></a>";
				}
				echo "</td>";
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