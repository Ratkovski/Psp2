<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http:www.w3.org/TR/xhtml1/DTD/xhtml1-scrict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
	<head>
		<title> Alterar </title>
	</head>
<font color="black">
<center><h1>Editar PSP</h1></center>
<?php
	error_reporting(0); 
		$link = mysql_connect ("localhost", "root", "40818") or die("Não foi possível conectar ao Banco de Dados!");
		
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
		
		if(isset($_POST["id"]))
		{
			$ID= $_POST['id'];
				$HORAS_PLANEJAMENTO = $_POST['horas_planejamento'];
		$HORAS_REALIZADO = $_POST['horas_realizado'];
		$DATA_ENTREGA = $_POST['data_entrega'];
		$CONCLUIDO = $_POST['concluido'];
		$RESPONSAVEL = $_POST['responsavel'];
		$ID_ETAPAS = $_POST['etapa_id'];
		$ID_PESSOAS = $_POST['pessoa_id'];
			
			$SQL = "UPDATE psp SET `horas_planejamento`='$HORAS_PLANEJAMENTO', `horas_realizado`='$HORAS_REALIZADO', `data_entrega`='$DATA_ENTREGA, `concluido`=$CONCLUIDO, `responsavel`='$RESPONSAVEL, `etapa_id`='$ID_ETAPAS, `pessoa_id`='$ID_PESSOAS'
			WHERE id = '$ID'";
						
			$resultado = mysql_query($SQL) or die ("<br> Falha na execução do Update!");
			
			echo("<h1><center>Registro alterado com sucesso!</h1> <br> <a href='tabela_tipo_servico.php'> Voltar a listagem! </a>");
		}
		
?>

</body>
</html>