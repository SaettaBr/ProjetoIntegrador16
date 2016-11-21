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
    <li><a href="#">Listar Usuários</a></li>
    <li><a href="#">Alterar Usuários</a></li>
    <li><a href="#">Ajuda</a></li>
   </ul>
  </div>
 </div>
</nav>
<br/>
<br/>
<br/>

                             
                    <div class="container text-center">
        <form name="lista" id="lista" class="form-horizontal" action="listagem.php" method="post">
        <label class="col-md-4 control-label" for="selectbasic">Organizar por:</label>
  		<div class="col-md-4">
        <select id="listar" name="listar" class="form-control" <button type="button" class="btn btn-danger">Botão</button>
        <option value="1">Nome</option>      
        <option value="2">Matricula</option>
                   <div class="col-md-8">
			  </div>
      </select>
	  <br/>
       <div>
       <button id="enviar" name="enviar" class="btn btn-success">  Enviar  </button>
	</div>
</div>
		 
 <script src="bootstrap/js/jquery.min.js"></script>
 <script src="bootstrap/js//bootstrap.min.js"></script>
 
</body>
</html>