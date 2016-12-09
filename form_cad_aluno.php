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
		<form name="formCad" id="formCad" class="form-horizontal" action="cadAluno.php" method="post">
			<fieldset>
				<legend><h2>Cadastro de Alunos</h2></legend>
               
			<div class="form-group">
				<label class="col-md-4 control-label" for="matricula">Matrícula:</label>  
				<div class="col-md-4">
					<input id="matricula" name="matricula" type="text" class="form-control input-md" required>
				</div>
			</div>
                
			<div class="form-group">
				<label class="col-md-4 control-label" for="nome">Nome:</label>  
				<div class="col-md-4">
					<input id="nome" name="nome" type="text" placeholder="Digite seu nome" class="form-control input-md">
				</div>
			</div>
                
			<div class="form-group">
                <label class="col-md-4 control-label" for="sexo">Sexo:</label>  
                <div class="col-md-2">
					<select class="form-control" name="sexo" id="sexo">
                    <option value="" selected="selected">Selecione um Sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    </select>
				</div>       
			</div>            
                    
			<div class="form-group">
				<label class="col-md-4 control-label" for="dtnasc">Data de Nascimento:</label>   
                <div class="col-md-4">
                	<input type="date" id="dtNasc" name="dtNasc" class="form-control input-md" >
				</div>
			</div>
             
            <div class="form-group">
				<label class="col-md-4 control-label" for="cidade">Cidade:</label>  
				<div class="col-md-4">
					<input id="cidade" name="cidade" type="text" placeholder="Digite a Cidade do aluno" class="form-control input-md">
				</div>
			</div> 
                
            <div class="form-group">
                <label  class="col-md-4 control-label" for="uf">UF:</label>   
                <div class="col-md-4">
                    <select id="uf" name="uf" class="form-control">
                    <option value="" selected="selected">Selecione uma UF</option>
                    <option value="AC">AC</option>	 
                    <option value="AL">AL</option>	 
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>          
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

 <script src="../bootstrap/js/jquery.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>