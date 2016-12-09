﻿<?php
session_start();
     include 'conecta.php';
	  
     
     $identEdit=$_GET['num'];
     $sql="SELECT * FROM projeto WHERE numero = '$identEdit'";
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
			    <form class="form-horizontal" action="atualiza_projeto.php" method="post">
				    <fieldset>
				    
					    <legend class="text-center">Cadastro de projeto</legend>
                        <div class="form-group">
                                   <label class="col-md-4 control-label" for="numero">Número:</label>  
                                   <div class="col-md-4">
                                        <input id="numero" name="numero" value="<?php echo $linha['numero']; ?>" type="integer" placeholder="Número" class="form-control input-md" disabled>
                                        <input id="numero" name="numero" type="hidden" value="<?php echo $linha['numero']; ?>">
                                   </div>
                              </div>
        
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="ano">Ano:</label>  
						    <div class="col-md-3">
							    <input id="ano" name="ano" type="number" value="<?php echo $linha['ano']; ?>" placeholder="Ano..." class="form-control input-md">
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="semestre">Semestre:</label>
						    <div class="col-md-2">
							    <select id="semestre" name="semestre" class="form-control">
                                <?php echo "<option value='".$linha['semestre']."'>".strtoupper($linha['semestre'])."</option>"; ?>
								    <option value="1">1º</option>
								    <option value="2">2º</option>
							    </select>
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="modulo">Módulo:</label>
						    <div class="col-md-2">
							    <select id="modulo" name="modulo" class="form-control">
                                <?php echo "<option value='".$linha['modulo']."'>".strtoupper($linha['modulo'])."</option>"; ?>
								    <option value="I">I</option>
								    <option value="II">II</option>
								    <option value="III">III</option>
								    <option value="IV">IV</option>
								    <option value="V">V</option>
							    </select>
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="dt_inicio">Data de início:</label>  
						    <div class="col-md-4">
							    <input id="dt_inicio" name="dt_inicio" type="date" value="<?php echo $linha['dt_inicio']; ?>" placeholder="Data de início..." class="form-control input-md">
						    </div>
					    </div>
					    
					    <div class="form-group">
						    <label class="col-md-4 control-label" for="dt_termino">Data de término:</label>  
						    <div class="col-md-4">
							    <input id="dt_termino" name="dt_termino" type="date" value="<?php echo $linha['dt_termino']; ?>" placeholder="Data de término..." class="form-control input-md">
						    </div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="tema">Tema:</label>  
							<div class="col-md-6">
								<input id="tema" name="tema" type="text" value="<?php echo $linha['tema']; ?>" placeholder="Tema..." class="form-control input-md">
							</div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="descricao">Descrição:</label>
							<div class="col-md-6">                     
								<textarea class="form-control" id="descricao" value="<?php echo $linha['descricao']; ?>" name="descricao"></textarea>
							</div>
						</div>
					    
						<div class="form-group">
							<label class="col-md-4 control-label" for="curso">Curso</label>
							<div class="col-md-6">
								<select id="curso" name="curso"  value="<?php echo $linha['curso']; ?>"class="form-control">
									<?php
										include 'conecta.php';
									    
										$sql="SELECT * FROM curso";
										$dados=pg_exec($conexao, $sql);
										$linha=pg_fetch_array($dados);
										$total = pg_num_rows($dados);
									    
										if($total > 0) {
											do {
												echo "<option value='".$linha['numero']."'>".$linha['nome']."</option>";
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
	 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/funcoes.js"></script>
</body>
</html>