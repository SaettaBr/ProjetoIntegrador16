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
<body> 
<?php
include 'menu.php';
?>
                   
                    <div class="container text-center">

        <form name="cadastro" id="cadastro" class="form-horizontal" action="cadUsuario.php" method="post">
            <fieldset>
                
                <legend><h2>Cadastro de usuário</h2></legend>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="login">Login:</label>  
                    <div class="col-md-4">
                        <input id="login" name="login" type="text" placeholder="Digite seu login"  class="form-control input-md">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="senha">Senha:</label>
                    <div class="col-md-4">
                        <input id="senha" name="senha" type="password" placeholder="Digite sua senha"  class="form-control input-md">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="confirmacao">Confirme sua Senha:</label>
                       <div class="col-md-4">
                     <input id="confirmacao" name="confirmacao" type="password" placeholder="Confirme sua senha"  class="form-control input-md">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome:</label>  
                    <div class="col-md-4">
                        <input id="nome" name="nome" type="text" placeholder="Digite seu nome"  class="form-control input-md">
                    </div>
                </div>
                                            
                <div class="form-group">
                    <label class="col-md-4 control-label" for="categoria">Categoria:</label>  
                <div class="col-md-4">
    <select class="form-control" name="categoria"  id="categoria" required>
    <option value="G">Gerente</option>
    <option value="P">Professor</option>
    <option value="C">Coordenador</option>
    </select>
		</div>       
    </div>          
                <div class="form-group">
                    <label class="col-md-4 control-label" for="situacao">Situação:</label>  
                <div class="col-md-4">
    <select class="form-control" name="situacao"  id="situacao" required>
    <option value="A">Ativo</option>
    <option value="I">Inativo</option>
    </select>
		</div>       
    </div>     
                <div class="form-group">
                    <div class="col-md-12">
                        <button id="enviar" name="enviar" class="btn btn-success">Enviar</button>
                        <button type="reset" id="limpar" name="limpar" class="btn btn-danger">Limpar</button>
                        <button type="back" id="voltar" name="voltar" class="btn btn-warning" onClick="history.back()">Voltar</button>
                    </div>
                </div>
            
            </fieldset>
        </form>

    </div>

 <script src="bootstrap/js/jquery.min.js"></script>
 <script src="bootstrap/js//bootstrap.min.js"></script>
 
</body>
</html>