<!DOCTYPE html>
<html lang="en">

<head>

   	<meta http-equiv="Content-Type" content="text/html; charset= iso-8859-1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PSP</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
			
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">PSP</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="tabelapessoa.php">Pessoas</a>
                    </li>
                    <li>
                        <a href="tabelaetapa.php">Etapas</a>
                    </li>
				   <li>
                        <a href="tabelapsp.php">PSP</a>
                    </li>
                    <li>
                        <a href="geralpsp.php">Geral PSP</a>
                    </li>
					
					            </li>
					
					</div>
					</ul>
  </div>
  </nav>
  
<!--colocar a tabela-->


    <div class="container">
            <div class="row">
                <h3>Tabela PSP</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                     <th>Nivel</th>
                     <th>Planejado</th>
					 <th>Realizado</th>
					 <th>% Até o Momento</th>
					 <th>Variação PlanejadoXRealizado</th>
				     <th>Responsável</th>
				     <th>Data Entrega</th>
				
                    </tr>
                  </thead>
                  <tbody>
               
			   
			   
			   <?php

		
	                    error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
	
		if(isset($_POST["filtro"]))
		{
			$FILTRO = $_POST['filtro'];
		
			
		$SQL="SELECT A.*,B.nome_etapa AS Etapa,C.nome_pessoa as Pessoa
	   FROM psp A
INNER JOIN etapa  B on(B.id = A.etapa_id)
INNER JOIN pessoa  C on(C.id = A.pessoa_id)
;";
		}			
		else
		
		$SQL = "SELECT A.*,B.nome_etapa AS Etapa,C.nome_pessoa as Pessoa
	   FROM psp A
INNER JOIN etapa  B on(B.id = A.etapa_id)
INNER JOIN pessoa  C on(C.id = A.pessoa_id)
;";
		
		
		$resultado = mysql_query($SQL) or die ("Falha na execução da consulta!");
			

	
;			$cont = 0;
			
	while ($linha = mysql_fetch_assoc($resultado))
	{
	
		$NOME_ETAPA = $linha['Etapa'];
		$PLANEJADO= $linha['horas_planejamento'];
			$REALIZADO= $linha['horas_realizado'];
				$MOMENTO= $linha['horas_planejamento'] / $linha['horas_realizado']*100;
				$VARIAÇAO= $linha['horas_realizado'] - $linha['horas_planejamento'];
				$RESPONSAVEL= $linha['Pessoa'];
					$DATA= $linha['data_entrega'];
		if(($cont%2) == 0){ //faz o zebrado
			echo("<tr bgcolor=#DCDCDC>");
		}
		else{
			echo("<tr bgcolor=#F5F5F5>");
		}
		$cont++;		
		
		echo("	
				<td>".$NOME_ETAPA."</td>
				<td>".$PLANEJADO."</td>
			    <td>".$REALIZADO."</td>
				<td>".$MOMENTO."</td>
				<td>".$VARIAÇAO."</td>
				<td>".$RESPONSAVEL."</td>
				<td>".$DATA."</td>
				
	
				
				");			
	}
	
?>
</html>
</table>
  </div>
  </nav>
  
<!--colocar a tabela-->
    <div class="container">
            <div class="row">
                <h3>Total</h3>
            </div>
            <div  class="row col-xs-5">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                  
                     <th>Planejado</th>
					  
<?php


		
	                    error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
	
		
		
			
		$SQL="SELECT sum(horas_planejamento) AS soma from psp;";

		
	$resultado = mysql_query($SQL) or die ("Falha na execução da consulta!");
			

	
;			$cont = 0;
			
	while ($linha = mysql_fetch_assoc($resultado))
	{
	
		$HorasP = $linha['soma'];
		
			if(($cont%2) == 0){ //faz o zebrado
			echo("<tr bgcolor=#DCDCDC>");
		}
		else{
			echo("<tr bgcolor=#F5F5F5>");
		}
		$cont++;		
	
	echo("<td>".$HorasP."</td>");
	}
?>
  
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                  
                     <th>Realizado</th>
<?php


		
	                    error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
	
		
		
			
		$SQL="SELECT sum(horas_realizado) AS soma from psp;";

		
	$resultado = mysql_query($SQL) or die ("Falha na execução da consulta!");
			

	
;			$cont = 0;
			
	while ($linha = mysql_fetch_assoc($resultado))
	{
	
		$HorasR = $linha['soma'];
			if(($cont%2) == 0){ //faz o zebrado
			echo("<tr bgcolor=#DCDCDC>");
		}
		else{
			echo("<tr bgcolor=#F5F5F5>");
		}
		$cont++;		
	
	echo("<td>".$HorasR."</td>");
	}
?>




				
                  </tbody>
            </table>
        </div>
		</tr>
		</div>
		</div>
		
		
		
		
		   <?php
 error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
		
		$SQL="SELECT A.*,B.nome_etapa AS Etapa,C.nome_pessoa as Pessoa
	   FROM psp A
INNER JOIN etapa  B on(B.id = A.etapa_id)
INNER JOIN pessoa  C on(C.id = A.pessoa_id)
;";
		$resultado = mysql_query($SQL);
		$tabela="[['Nome Tarefa','Horas Realizado']";
		while($linha=mysql_fetch_assoc($resultado)){
			$nometarefa=$linha['Etapa'];
				$qtdhora=$linha['horas_realizado'];
				$tabela=$tabela.",['".$nometarefa."',".$qtdhora."]";
			
			
		}
		$tabela=$tabela."]";

?>



<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
		<?php echo($tabela);?> );

        var options = {
          title: 'PSP',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
	
	
	
	
	   <?php
 error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
		
		$SQL="SELECT A.*,B.nome_etapa AS Etapa,C.nome_pessoa as Pessoa
	   FROM psp A
INNER JOIN etapa  B on(B.id = A.etapa_id)
INNER JOIN pessoa  C on(C.id = A.pessoa_id)
;";
		$resultado = mysql_query($SQL);
		$tabela="[['Nome Tarefa','Horas por Tarefa']";
		while($linha=mysql_fetch_assoc($resultado)){
			$nometarefa=$linha['Etapa'];
				$qtdhora=$linha['horas_planejamento'];
				$tabela=$tabela.",['".$nometarefa."',".$qtdhora."]";
			
			
		}
		$tabela=$tabela."]";

?>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset= iso-8859-1">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
      <?php echo($tabela);?> );

        var options = {
          chart: {
            title: 'PSP',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
	
	
	
	
	
	
  </body>
</html>
    </div> <!-- /container -->
  </body>
</html>




