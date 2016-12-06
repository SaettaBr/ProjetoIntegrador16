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
                  
	<div class="container text-center">
		<form name="formCad" id="formCad" class="form-horizontal" action="cadDisciplina.php" method="post">
			<fieldset>
				<legend><h2>Cadastro de Disciplinas</h2></legend>
               
			<div class="form-group">
				<label class="col-md-4 control-label" for="codigo">Código:</label>  
				<div class="col-md-4">
					<input id="codigo" name="codigo" type="number" class="form-control input-md" placeholder="Digite o código da disciplina"  required>
				</div>
			</div>
                
			<div class="form-group">
				<label class="col-md-4 control-label" for="nome">Nome:</label>  
				<div class="col-md-4">
					<input id="nome" name="nome" type="text" placeholder="Digite o nome da disciplina" class="form-control input-md">
				</div>
			</div>
                
			       
            <div class="form-group">
				<label class="col-md-4 control-label" for="ch">Carga Horária:</label>  
				<div class="col-md-4">
                <input id="ch" name="ch" type="number" class="form-control input-md" placeholder="Digite a carga horária do Curso" class="form-control input-md">
				</div>
			</div> 
                
			<div class="form-group">
                <div class="col-md-12">
                    <button id="enviar" name="enviar" class="btn btn-success">Enviar</button>
                    <button type="reset" id="limpar" name="limpar" class="btn btn-danger">Limpar</button>
                    <button type="back" id="voltar" name="voltar" class="btn btn-warning" onClick="history.back()">Voltar</button>

    			</div>
			</div>

	    </fieldset>
    </form>
</div>

 <script src="../bootstrap/js/jquery.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>