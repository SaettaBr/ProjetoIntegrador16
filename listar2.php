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
      <li><a href="logout.php">Sair</a></li>
   </ul>
  </div>
 </div>
</nav>
<br/>
<br/>
<br/>
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

		$sql = "select matricula,nome,sexo,to_char(dtnasc, 'DD/MM/YYYY') as dtnasc,cidade,uf from aluno";
		$result = pg_query($conexao,$sql);
		$rowss = pg_num_rows($result);
		$index = 0;
		
		if($result != null && $result != false && $rowss > 0){
			echo '<h1 color="#006295">Resultado da Consulta dos Alunos</h1>';			
			$dados = pg_fetch_array($result,$index,PGSQL_ASSOC);
			echo '<div class="table-responsive">';
			echo '<table class="table table-striped table-hover">';
			echo '<thead>';
			echo "<tr>";
			echo "<td align=center>Nome</td>";
			echo "<td align=center>Curso</td>";
			echo "<td align=center>Projeto Integrador</td>";
			echo "</tr>";
			echo '</thead>';
			echo '<tbody>';
			while($index < $rowss){
				$dados = pg_fetch_array($result,$index,PGSQL_ASSOC);
				$sexo = (($dados['sexo'] == 'm') ? 'Masculino' : (($dados['sexo'] == 'M') ? 'Masculino' :(($dados['sexo'] == 'F') ? 'Feminino' :'Feminino'))); 
				$identEdit = trim($dados['matricula']);
				$identExclud = trim($dados['matricula']);
				$identTRow = $identEdit . $identExclud;
				$sql2 = "select sigla from curso c, projeto p, grupo g, participa pt, aluno a where c.numero=p.num_curso and p.numero=g.num_proj and g.id = pt.id_grupo and pt.matricula = a.matricula and a.matricula = '$identEdit'";
		$result2 = pg_query($conexao,$sql2);
		$dados2 = pg_fetch_array($result2);
				$identPi = "http://".trim($dados2['sigla']).".projetointegrador.com.br/~".trim($dados['matricula']);
				echo "<td align=center><p>".$dados['nome']."</p></td>";
				echo "<td align=center><p>".$dados['dtnasc']."</p></td>";
				echo "<td align=center><a id='$identEdit' href='$identPi' onclick='collectElement( this.id )'><i class='glyphicon glyphicon-link'></i></a></td>";
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
</body>
</html>