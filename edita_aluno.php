<?php
     include 'verifica.php';
     include 'conecta.php';
     
     $ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
     $PATH = $ArrPATH[count($ArrPATH)-1];
     
     $matricula=$_POST['matricula'];
     $sql="SELECT * FROM aluno WHERE matricula = '$matricula'";
     $dados=pg_exec($conexao, $sql);
     $linha=pg_fetch_array($dados);
     

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
                    <form class="form-horizontal" action="atualiza_aluno.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Editar aluno</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="matricula">Matrícula:</label>  
                                   <div class="col-md-4">
                                        <input id="matricula" name="matricula" value="<?php echo $linha['matricula']; ?>" type="text" placeholder="Matricula..." class="form-control input-md" disabled>
                                        <input id="matricula" name="matricula" type="hidden" value="<?php echo $linha['matricula']; ?>">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="nome">Nome Completo</label>  
                                   <div class="col-md-6">
                                        <input id="nome" name="nome" value="<?php echo $linha['nome']; ?>" type="text" placeholder="Nome completo..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="sexo">Sexo</label>
                                   <div class="col-md-4"> 
                                        <label class="radio-inline" for="sexo-0">
                                             <input type="radio" name="sexo" id="sexo-0" value="f" <?php if ($linha['sexo'] == "f") { echo "checked='checked'"; } ?> >
                                             Feminino
                                        </label> 
                                        <label class="radio-inline" for="sexo-1">
                                             <input type="radio" name="sexo" id="sexo-1" value="m" <?php if ($linha['sexo'] == "m") { echo "checked='checked'"; } ?>>
                                             Masculino
                                        </label>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="dtnasc">Data de nascimento:</label>  
                                   <div class="col-md-4">
                                        <input id="dtnasc" name="dtnasc" value="<?php echo $linha['dtnasc']; ?>" type="date" class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="cidade">Cidade:</label>  
                                   <div class="col-md-4">
                                        <input id="cidade" name="cidade" value="<?php echo $linha['cidade']; ?>" type="text" placeholder="Cidade..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="uf">UF:</label>
                                   <div class="col-md-3">
                                        <select id="uf" name="uf" class="form-control">
                                             <?php echo "<option value='".$linha['uf']."'>".strtoupper($linha['uf'])."</option>"; ?>
                                             <option value="ac">AC</option>
                                             <option value="al">AL</option>
                                             <option value="am">AM</option>
                                             <option value="ap">AP</option>
                                             <option value="ba">BA</option>
                                             <option value="ce">CE</option>
                                             <option value="df">DF</option>
                                             <option value="es">ES</option>
                                             <option value="go">GO</option>
                                             <option value="ma">MA</option>
                                             <option value="mg">MG</option>
                                             <option value="ms">MS</option>
                                             <option value="mt">MT</option>
                                             <option value="pa">PA</option>
                                             <option value="pb">PB</option>
                                             <option value="pe">PE</option>
                                             <option value="pi">PI</option>
                                             <option value="pr">PR</option>
                                             <option value="rj">RJ</option>
                                             <option value="rn">RN</option>
                                             <option value="ro">RO</option>
                                             <option value="rr">RR</option>
                                             <option value="rs">RS</option>
                                             <option value="sc">SC</option>
                                             <option value="se">SE</option>
                                             <option value="sp">SP</option>
                                             <option value="to">TO</option>
                                        </select>
                                   </div>
                              </div>
                              
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
                                        <a href="lista_aluno.php" class="btn btn-danger">Voltar</a>
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