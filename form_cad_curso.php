﻿<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>SIPI</title>

 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="../bootstrap/css/style.css" rel="stylesheet">
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
    <li><a href="/index.html">Início</a></li>
    <li><a href="#">Listar Curso</a></li>
    <li><a href="#">Alterar Curso</a></li>
    <li><a href="#">Ajuda</a></li>
   </ul>
  </div>
 </div>
</nav>
<br/>
<br/>
<br/>

	<div class="container text-center">
		<form name="formCad" id="formCad" class="form-horizontal" action="cadCurso.php" method="post">
			<fieldset>
				<legend><h2>Cadastro de Cursos</h2></legend>
               
			<div class="form-group">
				<label class="col-md-4 control-label" for="numero">Número:</label>  
				<div class="col-md-4">
					<input id="numero" name="numero" type="number" class="form-control input-md" placeholder="Digite o código do curso"  required>
				</div>
			</div>
                
			<div class="form-group">
				<label class="col-md-4 control-label" for="nome">Nome:</label>  
				<div class="col-md-4">
					<input id="nome" name="nome" type="text" placeholder="Digite o nome do curso" class="form-control input-md">
				</div>
			</div>
                
			       
            <div class="form-group">
				<label class="col-md-4 control-label" for="sigla">Sigla:</label>  
				<div class="col-md-4">
					<input id="sigla" name="sigla" type="text" placeholder="Digite a sigla do Curso" class="form-control input-md">
				</div>
			</div> 
                
			<div class="form-group">
                <div class="col-md-12">
                    <button id="enviar" name="enviar" class="btn btn-success">Enviar</button>
                    <button type="reset" id="limpar" name="limpar" class="btn btn-danger">Limpar</button>
    			</div>
			</div>

	    </fieldset>
    </form>
</div>

 <script src="../bootstrap/js/jquery.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>