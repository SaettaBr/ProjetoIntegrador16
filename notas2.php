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
  
                   
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
	 <script type="text/javascript" src="js/jquery.mask.js"/></script>
	 <script type="text/javascript">$(document).ready(function(){
		 $("#nota1").mask("99.9");
		 $("#nota2").mask("99.9");
		 $("#nota3").mask("99.9");
		 $("#nota4").mask("99.9");
	});	 
	</script>
</head>

<body> 
<?php
include 'menu.php';
?> 
     <div class="container">
          
          
          <div class="row marketing">
               <div class="col-lg-12">
                    <form class="form-horizontal" action="notas3.php" method="get" >
                         <fieldset>
                      
                              <legend class="text-center">Cadastrar notas dos alunos</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="grupo">Grupo:</label>
                                   <div class="col-md-5">
                                        <select id="grupo" name="grupo" class="form-control" >
                                             <option value="">Selecione...</option>
                                             <?php
                                                  include 'conecta.php';
												  $grupo = $_GET['projeto'];
                                                  $sql = "SELECT * FROM grupo where num_proj='$grupo'";
                                                  $dados = pg_exec($conexao, $sql);
                                                  $linha = pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['id']."'>".$linha['nome']."</option>";
                                                       }while($linha = pg_fetch_assoc($dados));
                                                  }
                                             ?>
                                        </select>
                                   </div>
                              </div>
                                   <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar">
                                        <input type="reset" id="limpar" name="limpar" class="btn btn-warning" value="Limpar" onclick="return limpa();">
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