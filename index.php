<?php
	 include 'conecta.php';
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <X-XSS-Protection: 1; mode=block>
 <title>SIPI</title>

 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="bootstrap/css/style.css" rel="stylesheet">
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
    <li><a href="listar2.php">Listagem de Alunos</a></li>
     </ul>
  </div>
 </div>
</nav>
<br/>
<br/>
<br/>

    <div class="container text-center">
        <form id="formlogin" name="formlogin" class="form-horizontal" action="login.php" method="post">
            <fieldset>
                
                <legend>Olá Seja Bem Vindo !!!</legend>
				
                <div class="form-group">
                    <label class="col-md-5 control-label" for="login">Login:</label>  
                    <div class="col-md-3">
                        <input id="login" name="login" type="text" placeholder="Digite seu usuário" class="form-control input-md">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-5 control-label" for="senha">Senha:</label>
                    <div class="col-md-3">
                        <input id="senha" name="senha" type="password" placeholder="Digite sua Senha" class="form-control input-md">
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" name="logar" id="logar" class="btn btn-success" />
                    </div>
                </div>
            
            </fieldset>
        </form>
    </div>


 <script src="bootstrap/js/jquery.min.js"></script>
 <script src="bootstrap/js//bootstrap.min.js"></script>
</body>
</html>




						                