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
                    
        
                    </nav>
                    <br/>
                    <br/>
                    <br/>
                  
	<div class="container">
		  
		<div class="row marketing">
		    <div class="col-lg-12">
			    <form class="form-horizontal" action="CadProjeto.php" method="post">
				    <fieldset>
				    
					    <legend class="text-center">Cadastro de projeto</legend>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="ano">Ano:</label>  
						    <div class="col-md-3">
							    <input id="ano" name="ano" type="number" placeholder="Ano..." class="form-control input-md">
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="semestre">Semestre:</label>
						    <div class="col-md-2">
							    <select id="semestre" name="semestre" class="form-control">
								    <option value="1">1º</option>
								    <option value="2">2º</option>
							    </select>
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="modulo">Módulo:</label>
						    <div class="col-md-2">
							    <select id="modulo" name="modulo" class="form-control">
								    <option value="I">I</option>
								    <option value="II">II</option>
								    <option value="III">III</option>
								    <option value="IV">IV</option>
								    <option value="V">V</option>
							    </select>
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="dt_inicio">Data de início:</label>  
						    <div class="col-md-4">
							    <input id="dt_inicio" name="dt_inicio" type="date" placeholder="Data de início..." class="form-control input-md">
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="dt_termino">Data de término:</label>  
						    <div class="col-md-4">
							    <input id="dt_termino" name="dt_termino" type="date" placeholder="Data de término..." class="form-control input-md">
						    </div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="tema">Tema:</label>  
							<div class="col-md-6">
								<input id="tema" name="tema" type="text" placeholder="Tema..." class="form-control input-md">
							</div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="descricao">Descrição:</label>
							<div class="col-md-6">                     
								<textarea class="form-control" id="descricao" name="descricao"></textarea>
							</div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="curso">Curso</label>
							<div class="col-md-6">
								<select id="curso" name="curso" class="form-control">
									<?php
										include 'conecta.php';
									    
										$sql="SELECT * FROM curso";
										$dados=pg_exec($conexao, $sql);
										$linha=pg_fetch_array($dados);
										$total = pg_num_rows($dados);
									    
										if($total > 0) {
											do {
												echo "<option value='".$linha['numero']."'>".$linha['nome']."</option>";
											}while($linha = pg_fetch_assoc($dados));
										}
									?>
								</select>
							</div>
						</div>
					    
						<div class="form-group text-center">
							<div class="col-md-12">
								<input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
								<input type="reset" id="limpar" name="limpar" class="btn btn-warning" value="Limpar"></input>
                                 <button type="back" id="voltar" name="voltar" class="btn btn-warning" onClick="history.back()">Voltar</button>

							</div>
						</div>
					    
					 </fieldset>
				</form>
			</div>
		</div>
	 
	</div>
	 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/funcoes.js"></script>
</body>
</html>