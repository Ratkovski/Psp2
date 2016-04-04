  <?php
     error_reporting(0);
       $link = mysql_connect(
	   "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD"); 
	   mysql_select_db("mydb2") or die ("não foi possivel selecionar o BD");
	   $nome  = $_POST['nome_pessoa'];
	   $SQL =  "INSERT INTO pessoa(nome_pessoa)
	VALUES
	   ('$nome');";
	  // echo ($SQL);
	   $resultado = mysql_query($SQL) or die ("Falha na execucao do insert");
	 echo("<h1>Dados inseridos com sucesso! <a href='tabelapessoa.php'> Voltar</h1>");

   ?>