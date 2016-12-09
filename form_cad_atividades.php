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
   <div class="container">
		  
		<div class="row marketing">
		    <div class="col-lg-12">
			    <form class="form-horizontal" action="CadAtividades.php" method="post">
				    <fieldset>
				    
					    <legend class="text-center">Cadastro de Atividades</legend>
                              
                              <div class="form-group">
                                   <label class="col-md-4 control-label" for="projeto">Projeto:</label>
                                   <div class="col-md-5">
                                        <select id="projeto" name="projeto" class="form-control">
                                             <option value="">Selecione...</option>
                                             <?php
                                                  include 'conecta.php';
                                                  
                                                  $sql = "SELECT * FROM projeto";
                                                  $dados = pg_query($conexao, $sql);
                                                  $linha = pg_fetch_array($dados);
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
							<div class="form-group">
							<label class="col-md-4 control-label" for="disciplina">Disciplina</label>
							<div class="col-md-6">
								<select id="disciplina" name="disciplina" class="form-control">
									<?php
										include 'conecta.php';
									    
										$sql="SELECT * FROM disciplina";
										$dados=pg_query($conexao, $sql);
										$linha=pg_fetch_array($dados);
										$total = pg_num_rows($dados);
									    
										if($total > 0) {
											do {
												echo "<option value='".$linha['codigo']."'>".$linha['nome']."</option>";
											}while($linha = pg_fetch_assoc($dados));
										}
									?>
								</select>
							</div>
						</div>
					    
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="descricao">Descrição:</label>
							<div class="col-md-6">                     
								<textarea class="form-control" id="descricao" name="descricao"></textarea>
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
	 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/funcoes.js"></script>
</body>
</html>