﻿<?php
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
				<legend class="text-center">Relação de Projetos</legend>
     				<div class="form-group">
                    <label class="col-md-4 control-label" for="ano">Ano:</label>
                    	<div class="col-md-2">
                    	    <select id="ano" name="ano" class="form-control">
                        	<option value="">Selecione...</option>
                            <?php
                            include 'conecta.php';
                            $sql = "SELECT DISTINCT ano FROM projeto";
                            $dados = pg_query($conexao, $sql);
                            $linha = pg_fetch_array($dados);
                            $total = pg_num_rows($dados);
                                              
                            if($total > 0) {
                            	do {
                            		echo "<option value='".$linha['ano']."'>".$linha['ano']."</option>";
                                }while($linha = pg_fetch_assoc($dados));
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="semestre">Semestre:</label>
                    	<div class="col-md-2">
                        	<select id="semestre" name="semestre" class="form-control">
                            <option value="">Selecione...</option>
                            <?php
                            include 'conecta.php';
                            $sql = "SELECT DISTINCT semestre FROM projeto";
                            $dados = pg_query($conexao, $sql);
                            $linha = pg_fetch_array($dados);
                            $total = pg_num_rows($dados);
                            if($total > 0) {
                            	do {
                                echo "<option value='".$linha['semestre']."'>".$linha['semestre']."</option>";
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
if (isset($_POST['ano'])) {
	$ano = $_POST['ano'];
}
if (isset($_POST['semestre'])) {
$semestre = $_POST['semestre'];
}
if ($conexao) {
    if (isset($ano)) {
           if ($ano != "") {
                 if (isset($semestre)) {
                          if ($semestre != "") {
                               $sql = "SELECT pj.*, c.nome, d.nome, co.desc_atividade FROM projeto pj, curso c, composto co, disciplina d WHERE pj.num_curso = c.numero AND co.num_proj = pj.numero AND co.cod_disc = d.codigo AND pj.ano = '$ano' AND pj.semestre = '$semestre' ORDER BY 1";
                                $dados = pg_query($sql);
                                $linha = pg_fetch_array($dados);
                                if (pg_num_rows($dados)) {
                                    echo "<div class='row marketing'><div id='list' class='row'><div class='table-responsive col-md-12'><table class='table table-striped' cellspacing='0' cellpadding='0'><thead><tr><th>Número</th><th>Ano</th><th>Semestre</th><th>Módulo</th><th>Início</th><th>Término</th><th>Tema</th><th>Descrição</th><th>Número Curso</th><th>Nome Curso</th><th>Disciplina</th><th>Descrição Atividade</th></tr></thead><tbody>";
                                    do {
                                       echo "<tr><td>".$linha['numero']."</td><td>".$linha['ano']."</td><td>".$linha['semestre']."</td><td>".$linha['modulo']."</td><td>".$linha['dt_inicio']."</td><td>".$linha['dt_termino']."</td><td>".$linha['tema']."</td><td>".$linha['descricao']."</td><td>".$linha['num_curso']."</td><td>".$linha['nome']."</td><td>".$linha['nome']."</td><td>".$linha['desc_atividade']."</td></tr>";
                                    } while ($linha = pg_fetch_assoc($dados));
                                    echo "</tbody></table></div></div></div>";
                                }else {
                                    echo "<h3 class='text-center'>Nenhum projeto encontrado.</h3>";
								}
							}else{
                               echo "<h3 class='text-center'>O semestre não foi informado.</h3>";
                            }
                 } 
           } else {
                echo "<h3 class='text-center'>O ano não foi informado.</h3>";
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