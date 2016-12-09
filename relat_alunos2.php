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