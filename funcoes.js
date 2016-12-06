document.getElementById("busca").onclick = function(){
	nomealuno = prompt ("Informe o nome do Aluno");
	var xmlHttp = new xmlHttpRequest();
	xmlHttp.onreadystatechange =  function(){
		if(xmlHttp.readystate == 4 && xmlHttp == 200){
			document.getElementById("integ01").innerHTML =xmlHttp.responseText
			};
			var url = "buscaAluno.php?aluno="+nome;
			xmlHttp.open ("GET",url,true);
			xmlHttp.send;
			}
}
