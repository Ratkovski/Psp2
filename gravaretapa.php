  <?php
     error_reporting(0);
       $link = mysql_connect(
	   "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
	   
	   mysql_select_db("mydb2") or die ("não foi possivel selecionar o BD");
	   $etapa = $_POST['nome_etapa'];
	 
	
	   $SQL =  "insert into etapa(nome_etapa)
	VALUES
	   ('$etapa' );";
	  // echo ($SQL);
	   $resultado = mysql_query($SQL) or die ("Falha na execucao do insert");
	  echo("<h1>Dados inseridos com sucesso! <a href='tabelaetapa.php'> Voltar</h1>");
  

   
   ?>