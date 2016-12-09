<?php
session_start();
     include 'conecta.php';
	 $identEdit=$_GET['num'];
     $sql="SELECT * FROM curso WHERE numero ='$identEdit'";
     $dados1=pg_exec($conexao, $sql);
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
	<div class="container text-center">
		<form name="formCad" id="formCad" class="form-horizontal" action="atualiza_curso.php" method="post">
			<fieldset>
				<legend><h2>Cadastro de Cursos</h2></legend>
               
			<div class="form-group">
				<label class="col-md-4 control-label" for="numero">Número:</label>  
				<div class="col-md-4">
					<input id="numero" name="numero" type="number" value="<?php echo $linha['numero']; ?>" class="form-control input-md" placeholder="Digite o código do curso"  disabled>
                    <input id="nnumero" name="numero" type="hidden" value="<?php echo $linha['numero']; ?>">
				</div>
			</div>
                
			<div class="form-group">
				<label class="col-md-4 control-label" for="nome">Nome:</label>  
				<div class="col-md-4">
					<input id="nome" name="nome" type="text" value="<?php echo $linha['nome'];?>" placeholder="Digite o nome do curso" class="form-control input-md">
				</div>
			</div>
                
			       
            <div class="form-group">
				<label class="col-md-4 control-label" for="sigla">Sigla:</label>  
				<div class="col-md-4">
					<input id="sigla" name="sigla" type="text"  value="<?php echo $linha['sigla'];?>" placeholder="Digite a sigla do Curso" class="form-control input-md">
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