<?php
     include 'conecta.php';
     $identEdit=$_GET['id'];
     $sql="SELECT * FROM grupo WHERE id = '$identEdit'";
     $dados1=pg_query($conexao, $sql);
     $linha=pg_fetch_array($dados1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<script type="text/javascript">
var req;
function buscar(valor, id) {
    var resultado = "resultado" + id;
    if(window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var url = "buscaAluno.php?valor="+valor+"&id="+id;
    req.open("Get", url, true);
    req.onreadystatechange = function() {
        if(req.readyState == 1) {
            document.getElementById(resultado).innerHTML = 'Aguarde ...';
        }
        if(req.readyState == 4 && req.status == 200) {
            var resposta = req.responseText;
            document.getElementById(resultado).innerHTML = resposta;
        }
    };
    req.send(null);
}

function adciona(i, id) {
    var campMatricula = "matricula"+ id + i;
    var campIntegrante = "integ0" + id;
    var modal = "#busca" + id;
    var matricula = document.getElementById(campMatricula).value;
    
    if (matricula !== "") {
        document.getElementById(campIntegrante).value = matricula;
        $(modal).modal('hide');
        return false;
    }
}

</script>
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
                                <li><a href="form_cad_atividades.php">Atividade</a></li>
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
                                <li><a href="list_atividades.php">Atividade</a></li>
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
                                <li><a href="relat_projetos.php">Projetos</a></li>
                                <li><a href="relat_alunos2.php">Alunos X Projetos</a></li>
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
</div>
</div>
</nav>
<br/>
<br/>
<br/>      
     <div class="container">
         
          
          <div class="row marketing">
               <div class="col-lg-12">
                    <form name="form1" id="form1" class="form-horizontal" action="atualiza_grupo.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Cadastro de grupo</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="id">Id:</label>  
                                   <div class="col-md-4">
                                        <input id="id" name="id" type="number" value="<?php echo $linha['id']; ?>" placeholder="Id do grupo..." class="form-control input-md" disabled>
                                       <input id="id" name="id" type="hidden" value="<?php echo $linha['id']; ?>">

                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="nome">Nome:</label>  
                                   <div class="col-md-6">
                                        <input id="nome" name="nome" type="text"  value="<?php echo $linha['nome']; ?>" placeholder="Nome do grupo..." class="form-control input-md">
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="">Integrantes:</label>
                                   <div class="col-md-6">
                                        <div class="input-group">
                                             <input id="integ01" name="integ01" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca1'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                        <div class="input-group">
                                             <input id="integ02" name="integ02" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca2'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                        <div class="input-group">
                                             <input id="integ03" name="integ03" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca3'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                        <div class="input-group">
                                             <input id="integ04" name="integ04" class="form-control" placeholder="Nome do integrante..." type="text">
                                             <span class="input-group-btn">
                                                  <a class="btn btn-primary" href='' data-toggle='modal' data-target='#busca4'>
                                                       <span class="glyphicon glyphicon-search"></span>
                                                  </a>
                                             </span>
                                        </div>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="projeto">Projeto:</label>
                                   <div class="col-md-6">
                                        <select id="projeto" name="projeto" class="form-control">
                                             <?php
                                                  include 'conecta.php';
                                                  
                                                  $sql="SELECT * FROM projeto";
                                                  $dados=pg_query($conexao, $sql);
                                                  $linha=pg_fetch_array($dados);
                                                  $total = pg_num_rows($dados);
                                                  
                                                  if($total > 0) {
                                                       do {
                                                            echo "<option value='".$linha['numero']."'>".$linha['tema']."</option>";
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
     
     <!-- Modal -->
<div class="modal fade" id="busca1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alunos</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 1);" />      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    <div id="resultado1"></div>
    </div>
    </div>
  </div>



<div class="modal fade" id="busca2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alunos</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 2);" />      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      <div id="resultado2"></div>
    </div>
  </div>
  </div>


<div class="modal fade" id="busca3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alunos</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 3);" />      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      <div id="resultado3"></div>
    </div>
  </div>
  </div>


<div class="modal fade" id="busca4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alunos</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="busca" class="form-control" id="busca" onkeyup="buscar(this.value, 4);" />      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      <div id="resultado4"></div>
    </div>
  </div>
  </div>

           
<!-- /.modal -->
     
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>