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
     <div class="container">
          
          
          <div class="row marketing">
               <div class="col-lg-12">
                    <form class="form-horizontal" action="cadNotas.php" method="post" >
                         <fieldset>
                      
                              <legend class="text-center">Lançamento de notas dos Alunos</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-12 control-label" for="alunos"></label>
                                   <div class="col-md-12">
            <?php
			include 'conecta.php';
			$alunos = $_GET['grupo'];
			$sql = "SELECT * FROM aluno a, participa p where p.id_grupo='$alunos' and p.matricula = a.matricula order by a.nome";
			$dados = pg_query($conexao, $sql);
			$total = pg_num_rows($dados);
			$index=1;
			echo "<table>";
			while( $linha = pg_fetch_array($dados) ){
						?>
                        <tr>
      						<td>  
                            	<input type="hidden" id="mat<?=$index;?>" name="mat<?=$index;?>" value="<?php echo $linha['matricula']; ?>"/>
                            	<input type="hidden" id="grupo<?=$index;?>" name="grupo<?=$index;?>" value="<?php echo $linha['id_grupo']; ?>"/>

                                <?=$linha['nome'];?>
                            </td>
                            <td>  
                                &nbsp;<input id="nota<?=$index;?>" name="nota<?=$index;?>" type="float" size=10/>
                            </td>
                        </tr>
            <?php
					$index++;
			}

			?>
            </table>
			
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