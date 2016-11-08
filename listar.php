<meta charset="utf-8">
<?php
	include 'conecta.php';	
		$receive = isset($_POST[""]) ? $_POST[""] : null;
	
	if($conexao != null){
		$matricula=$_POST['matricula'];
        	$nome=$_POST['nome'];
		$sexo=$_POST['sexo'];
		$dtNasc=$_POST['dtNasc'];
		$cidade=$_POST['cidade'];
		$uf=$_POST['uf']
		
		switch($receive){
			case '1':
				$orderer = "nome";
				break;
			case '2':
				$orderer = "matricula";
				break;
			default:
				$orderer = "nome";
				break;
		}
				
		$sql = "select matricula,nome,sexo,dtNasc,cidade,uf from public.aluno where 1=1 order by $orderer";
		
		foreach($columns as $value){
			if($value != $orderer){ $sql .= "," . $value;}
		}
				
		$strCon = "host=127.0.0.1 dbname=ProjetoIntegrador port=5432 user=teste password=root";	
		$result1 = pg_query($conexao, $sql);		
		$con = pg_connect($strCon);
		if(!$con){
			echo "</br>Não foi possível conectar com o Banco";
		}else{
			
			$result = pg_query($con,$sql);
			$rss = pg_fetch_all($result);
			
			if(sizeof($rss) == 0){
				echo "</br>Não há dados no DataBase";
			}else{
				echo "<table border 1>";
				echo "<tr>";
				echo "<th> Matricula: </th>";
				echo "<th> Nome: </th>";
				echo "<th> Sexo: </th>";
				echo "<th> Data de Nascimento: </th>";
				echo "<th> Cidade: </th>";
				echo "<th> UF: </th>";
				echo "</tr>";
				foreach((array)$rss as $valuer){
					echo "<tr>";
					foreach((array)$valuer as $key => $res){
						if($res == "m"){
							echo "<th>Masculino</th>";
						}elseif($res == "f"){
							echo "<th>Feminino</th>";
						}else echo "<th>$res</th>"; 
					}
					echo "</tr>";
				}
			}
			
			echo "</table>";
			
			pg_close($con);
		}
	}
?>
</br></br>
<a href="../index.html"><h2><b>Voltar</b></h2></a>
