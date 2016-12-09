<?php
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
           <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    <li>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="form_cad_aluno.php">Aluno</a></li>
                                <li><a href="form_cad_usuario.php">Usuários</a></li>
                                <li><a href="form_cad_curso.php">Cursos</a></li>
                                <li><a href="form_cad_disciplina.php">Disciplinas</a></li>
                                <li><a href="form_cad_projeto.php">Projetos</a></li>
                                <li><a href="form_cad_grupo.php">Grupos</a></li>
                                <li><a href="form_cad_atividades.php">Atividade</a></li>
                              </ul>
                              </li>
                    </ul>
                
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    <li>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultas<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="list_aluno.php">Aluno</a></li>
                                <li><a href="list_usuario.php">Usuários</a></li>
                                <li><a href="list_curso.php">Cursos</a></li>
                                <li><a href="list_disciplina.php">Disciplinas</a></li>
                                <li><a href="list_projeto.php">Projetos</a></li>
                                <li><a href="list_grupo.php">Grupos</a></li>
                                <li><a href="list_atividades.php">Atividade</a></li>
                              </ul>
                              </li>
                    </ul>
                    
                      <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    <li>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="relat_alunos.php">Alunos</a></li>
                                <li><a href="relat_grupos.php">Grupos</a></li>
                                <li><a href="relat_projetos.php">Projetos</a></li>
                                <li><a href="relat_alunos2.php">Alunos X Projetos</a></li>
                                 </ul>
                              </li>
                    </ul>
        <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-center">
      <li><a href="notas.php">Lançamento de notas</a></li>
   </ul>
 
    <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">Sair</a></li>
   </ul>
  </div>
</div>
</div>
</div>
</div>
</div>
</nav>
<br/>
<br/>
<br/>   
<div class="container">
	<div class="row marketing">
		<div class="col-lg-12">
			<form class="form-horizontal" method="post">
				<fieldset>
				<legend class="text-center">Relação de Alunos e seus Projetos</legend>
     				<div class="form-group">
                    <label class="col-md-4 control-label" for="aluno">Aluno:</label>
                    	<div class="col-md-8">
                    	    <select id="matricula" name="matricula" class="form-control">
                        	<option value="">Selecione...</option>
                            <?php
                            include 'conecta.php';
                            $sql = "select distinct matricula, nome from aluno order by nome";
                            $dados = pg_query($conexao, $sql);
                            $linha = pg_fetch_array($dados);
                            $total = pg_num_rows($dados);
                                              
                            if($total > 0) {
                            	do {
                            		echo "<option value='".$linha['matricula']."'>".$linha['nome']."</option>";
                                }while($linha = pg_fetch_assoc($dados));
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group text-center">
						<div class="col-md-12">
						<input type="submit" id="salvar" name="salvar" class="btn btn-primary" value="Enviar"></input>
						</div>
					</div>
                              
                </fieldset>
            </form>
        </div>
    </div>

<?php
if (isset($_POST['matricula'])) {
$aluno = $_POST['matricula'];
}

if ($conexao) {
    if (isset($aluno)) {
           if ($aluno != "") {
			    $sql = "select distinct p.tema, nota from projeto p, grupo g, participa pt, aluno a where p.numero = g.num_proj and pt.id_grupo = g.id and pt.matricula = a.matricula and a.matricula = '$aluno' ORDER BY p.tema";
               $dados = pg_query($sql);
               $linha = pg_fetch_array($dados);
               if (pg_num_rows($dados)) {
                    echo "<div class='row marketing'><div id='list' class='row'><div class='table-responsive col-md-12'>
                    <table class='table table-striped' cellspacing='0' cellpadding='0'><thead><tr><th>Tema</th><th>Nota
                    </th></tr></thead><tbody>";
                    do {
                       echo "<tr><td>".$linha['tema']."</td><td>".$linha['nota']."</td></tr>";
                    } while ($linha = pg_fetch_assoc($dados));
                    echo "</tbody></table></div></div></div>";
			   } else {
                   echo "<h3 class='text-center'>Nenhum aluno encontrado.</h3>";
               }
		    } else {
               echo "<h3 class='text-center'>Aluno não Informado.</h3>";
            }   
	}
 } else {
 echo "<h3 class='text-center'>Falha na conexão com o banco de dados.</h3>";
 }
          ?>
          </div>
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/funcoes.js"></script>	
          
          </body>
          </html>