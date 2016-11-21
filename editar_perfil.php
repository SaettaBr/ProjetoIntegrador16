<?php
     include 'verifica.php';
     
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
?>
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
     <div class="container">
          <?php
               include 'menu.php';
          ?>
        
          <div class="row marketing">
               <div class="col-lg-12">
                    <form class="form-horizontal" action="atualiza_usuario.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Alterar dados cadastrais</legend>
                              
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="login">Login:</label>  
                                  <div class="col-md-6">
                                      <input id="login" name="login" type="text" disabled value="<?php echo $_SESSION['login'] ?>" class="form-control input-md">
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="nome">Nome:</label>  
                                  <div class="col-md-6">
                                      <input id="nome" name="nome" type="text" value="<?php echo $_SESSION['nome'] ?>" class="form-control input-md">
                                  </div>
                              </div>
                              
                              <?php if (isset($_SESSION['categoria'])) { if ($_SESSION['categoria'] == "c") { ?>
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="categoria">Categoria:</label>
                                  <div class="col-md-6">
                                      <select id="categoria" name="categoria" class="form-control">
                                          <option value="">Selecione uma opção...</option>
                                          <option value="C">Coordenador</option>
                                          <option value="G">Gerente</option>
                                          <option value="P">Professor</option>
                                      </select>
                                  </div>
                              </div>
                              <?php } } ?>
                              
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="situacao">Situação:</label>
                                  <div class="col-md-6"> 
                                      <label class="radio-inline" for="situacao-0">
                                          <input type="radio" name="situacao" id="situacao-0" value="A" checked="checked">
                                          Ativo
                                      </label> 
                                      <label class="radio-inline" for="situacao-1">
                                          <input type="radio" name="situacao" id="situacao-1" value="I">
                                          Inativo
                                      </label>
                                  </div>
                              </div>
                              
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
                                        <a href="perfil.php" class="btn btn-danger">Voltar</a>
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