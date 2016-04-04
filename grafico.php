   <?php
 error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("grafico") or die ("Não foi possível selecionar o Banco de Dados!");
		
		$SQL="select * from tarefa";
		$resultado = mysql_query($SQL);
		$tabela="[['Nome tarefa','horas por tarefa']";
		while($linha=mysql_fetch_assoc($resultado)){
			$nometarefa=$linha['NOME_TAREFA'];
				$qtdhora=$linha['QTD_HORA'];
				$tabela=$tabela.",['".$nometarefa."',".$qtdhora."]";
			
			
		}
		$tabela=$tabela."]";

?>



<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
		<?php echo($tabela);?> );

        var options = {
          title: 'teste',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>