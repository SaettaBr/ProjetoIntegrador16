<?php
     session_start();
	 include 'conecta.php';
     $identEdit=$_GET['log'];
     $sql="SELECT * FROM usuario WHERE login = '$identEdit'";
     $dados1=pg_query($conexao, $sql);
     $linha=pg_fetch_array($dados1);
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
<?php
include 'menu.php';
?> 
     <div class="container">
                
          <div class="row marketing">
               <div class="col-lg-12">
                    <form class="form-horizontal" action="atualiza_usuario.php" method="post">
                         <fieldset>
                      
                              <legend class="text-center">Editar Usuário</legend>
                              
                             
                <div class="form-group">
                    <label class="col-md-4 control-label" for="login">Login:</label>  
                    <div class="col-md-4">
                        <input id="login" name="login" value="<?php echo $linha['login']; ?>" type="text" placeholder="Digite seu login"  class="form-control input-md" disabled>
                         <input id="login" name="login" type="hidden" value="<?php echo $linha['login']; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="senha">Senha:</label>
                    <div class="col-md-4">
                        <input id="senha" name="senha" type="password" value="" placeholder="Digite sua senha"  class="form-control input-md">
                   </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="confirmacao">Confirme sua Senha:</label>
                       <div class="col-md-4">
                     <input id="confirmacao" name="confirmacao" value="" type="password" placeholder="Confirme sua senha"  class="form-control input-md">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome:</label>  
                    <div class="col-md-4">
                        <input id="nome" name="nome" type="text" placeholder="Digite seu nome"  value="<?php echo $linha['nome']; ?>" class="form-control input-md">
                    </div>
                </div>
                                            
                <div class="form-group">
                    <label class="col-md-4 control-label" for="categoria">Categoria:</label>  
                <div class="col-md-4">
    <select class="form-control" name="categoria" value="<?php echo $linha['categoria']; ?> id="categoria" required>
    <option value="G">Gerente</option>
    <option value="P">Professor</option>
    <option value="C">Coordenador</option>
    </select>
		</div>       
    </div>          
                <div class="form-group">
                    <label class="col-md-4 control-label" for="situacao">Situação:</label>  
                <div class="col-md-4">
    <select class="form-control" name="situacao" value="<?php echo $linha['situacao']; ?>id="situacao" required>
    <option value="A">Ativo</option>
    <option value="I">Inativo</option>
    </select>
		</div>       
    </div>      
                              <div class="form-group text-center">
                                   <div class="col-md-12">
                                        <input type="submit" id="salvar" name="salvar" class="btn btn-success" value="Enviar"></input>
                                        <a href="list_aluno.php" class="btn btn-warning">Voltar</a>
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