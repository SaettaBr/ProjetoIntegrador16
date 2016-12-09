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
               <form name="aluno" id="aluno" class="table" action="cadNotas.php" method="post">
                   <legend class="text-center">Lançamento de notas dos Alunos</legend>
                             
                              
            <?php
			include 'conecta.php';
			$alunos = $_GET['grupo'];
			$sql = "SELECT * FROM aluno a, participa p where p.id_grupo='$alunos' and p.matricula = a.matricula order by a.nome";
			$dados = pg_query($conexao, $sql);
			$total = pg_num_rows($dados);
			$index=1;
			while( $linha = pg_fetch_array($dados) ){
						?>
<div class="container text-center">
    <div class="form-group">
        <label class="col-md-12 control-label" for="nome"></label>  
        <div class="col-md-8">
            <td> <input  type="hidden" id="mat<?=$index;?>" name="mat<?=$index;?>" value="<?php echo $linha['matricula']; ?>"/></td>
        </div>
    </div> 
    
    <div class="form-group">
        <label class="col-md-4 control-label" for="nota"></label>  
        <div class="col-md-4">
            <td><input  type="hidden" id="grupo<?=$index;?>" name="grupo<?=$index;?>" value="<?php echo $linha['id_grupo']; ?>"/></td>
        </div>
    </div> 
</div>       
	    
                                <?=$linha['nome'];?>
                            
                             
                                &nbsp;<input id="nota<?=$index;?>" name="nota<?=$index;?>" type="float" size=10/>
                          
            <?php
					$index++;
			}

			?>
          
            
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