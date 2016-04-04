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
			 <?php	
        error_reporting(0); 
		$link = mysql_connect ("localhost", "root", "40818") or die("Não foi possível conectar ao Banco de Dados!");
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");

 ?>
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
                      <th>ID</th>
                     <th>Horas Planejadas</th>
					  <th>Horas Realizadas</th>
					   <th>Data Entrega</th>
					    <th>Concluido</th>
						 <th>Responsavel</th>
						  <th>Etapa</th>
						   <th>Pessoas</th>
						    <th colspan='3'>Operações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                         error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
            
			if(isset($_GET["id"]))
		{
			$ID = $_GET["id"];
			$SQL = "DELETE FROM psp WHERE id = $ID";
			$resultado = mysql_query($SQL) or die ("<br> Falha na exclusão!");
			
			echo("<h1><center>Registro excluído com sucesso!</h1>");
		}
		
		

			
			
			
			
			
			
			
			
              if(isset($_POST["filtro"]))
		{
			$FILTRO = $_POST['filtro'];
			$SQL = "SELECT A.*,B.nome_etapa AS Etapa,C.nome_pessoa as Pessoa
	   FROM psp A
INNER JOIN etapa  B on(B.id = A.etapa_id)
INNER JOIN pessoa  C on(C.id = A.pessoa_id)
		   where A.nome_etapa like
		   '%$filtro%';";
		}			
		else
				   		$SQL =  "SELECT A.*,C.nome_pessoa as Pessoa,B.nome_etapa AS Etapa
	   FROM psp A
INNER JOIN etapa  B on(B.id = A.etapa_id)
INNER JOIN pessoa  C on(C.id = A.pessoa_id);";
		
		$resultado = mysql_query($SQL) or die ("Falha na execução da consulta!");

			
			$cont = 0;
			
	while ($linha = mysql_fetch_assoc($resultado))
	{
		$ID = $linha['id'];
		$HORAP = $linha['horas_planejamento'];
		$HORAR = $linha['horas_realizado'];
		$DATA = $linha['data_entrega'];
		$CONCLUIDO = $linha['concluido'];
		$RESPONSAVEL= $linha['responsavel'];
		$ETAPA= $linha['Etapa'];
		$PESSOA= $linha['Pessoa'];
		if(($cont%2) == 0){ //faz o zebrado
			echo("<tr bgcolor=#DCDCDC>");
		}
		else{
			echo("<tr bgcolor=#F5F5F5>");
		}
		$cont++;		
		
		echo("	<td>".$ID."</td>
				<td>".$HORAP."</td>
				<td>".$HORAR."</td>
				<td>".$DATA."</td>
				<td>".$CONCLUIDO."</td>
				<td>".$RESPONSAVEL."</td>
				<td>".$ETAPA."</td>
				<td>".$PESSOA."</td>
			
				</td>
				<td><a href='psp.php?id=$ID'>
				<img src='inserir.png' title='Adicionar'>
				</a>
				</td>
				<td><a href='tela_altera_psp.php?id=$ID'>
				<img src='editar.png' title='Editar'>
				</a>
				</td>
				<td><a href='tabelapsp.php?id=$ID'>
				<img src='excluir.png' title='Deletar'>
				</a>
				</td>
				
				");			
	}
?>
				
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
