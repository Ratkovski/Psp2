<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
	<head>
		<title> Alterar </title>
	</head>

<center><h1>Altera Pessoa</h1></center>
<?php
	error_reporting(0); 
		$link = mysql_connect ("localhost", "root", "40818") or die("Não foi possível conectar ao Banco de Dados!");
		
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
		
		if(isset($_POST["id"]))
		{
			$ID = $_POST["id"];
			$NOME_PESSOA = $_POST["nome_pessoa"];
		
			
			$SQL = "UPDATE pessoa SET nome_pessoa = '$NOME_PESSOA' WHERE id = '$ID'";
						
			$resultado = mysql_query($SQL) or die ("<br> Falha na execução do Update!");
			
			echo("<h1><center>Registro alterado com sucesso!</h1> <br> <a href='tabelapessoa.php'> Voltar a listagem! </a>");
		}
		
?>

</body>
</html>



</body>
</html>