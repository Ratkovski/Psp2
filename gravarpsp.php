<?php
     error_reporting(0);
       $link = mysql_connect(
	   "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
	   
	   
	   
	   
	   	mysql_select_db("mydb2") or die ("Nao foi possivel selecionar o BD");
		
	
		$HORAS_PLANEJAMENTO = $_POST['horas_planejamento'];
		$HORAS_REALIZADO = $_POST['horas_realizado'];
		$DATA_ENTREGA = $_POST['data_entrega'];
		$CONCLUIDO = $_POST['concluido'];
		$RESPONSAVEL = $_POST['pessoa_id'];
		$ID_ETAPAS = $_POST['etapa_id'];
		$ID_PESSOAS = $_POST['pessoa_id'];
		
		
		
		///	$SQL = "insert into psp (horas_planejadas,horas_realizadas,data_entrega,concluido,id_pessoa,id_etapa)values(10,8,"2015-10-01","s",1,1);"";
		
		
		
				$SQL = "INSERT INTO psp (`horas_planejamento`, `horas_realizado`, `data_entrega`, `concluido`, `responsavel`,`etapa_id`, `pessoa_id`)
		
		              values ('$HORAS_PLANEJAMENTO', '$HORAS_REALIZADO',  '$DATA_ENTREGA', '$CONCLUIDO' , '$RESPONSAVEL','$ID_ETAPAS','$ID_PESSOAS');";
		
		//echo($SQL);
		
		$resultado = mysql_query($SQL)
		or die ("Falha na execucao do INSERT");
		
		
		echo ("Dados Adicionados Com Sucesso!
		<a href =' tabelapsp.php '> Voltar</a>");
		
	
	
		

   
   ?>