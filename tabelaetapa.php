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
                <h3>Tabela Etapas</h3>
            </div>
            <div class="row ">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
					   
                     <th>Nome Etapas</th>
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
			$SQL = "DELETE FROM  etapa WHERE id = $ID";
			$resultado = mysql_query($SQL) or die ("<br> Falha na exclusão!");
			
			echo("<h1><center>Registro excluído com sucesso!</h1>");
		}
		
		echo ("<center><form action='tabelaetapa.php' method='post'>
				<input type='text' size='40' name='filtro'>
				<input type='submit' value='Consultar'>
				</form>
				<br>
				<br>");

			
			
			
			
			
			
			
			
              if(isset($_POST["filtro"]))
		{
			$FILTRO = $_POST['filtro'];
			$SQL = "SELECT * FROM etapa WHERE nome_etapa like '%$FILTRO%';";
		}			
		else
				   		$SQL = "SELECT * FROM etapa;";
		
		$resultado = mysql_query($SQL) or die ("Falha na execução da consulta!");

			
			$cont = 0;
			
	while ($linha = mysql_fetch_assoc($resultado))
	{
		$ID = $linha['id'];
		$NOME = $linha['nome_etapa'];
	
		
		if(($cont%2) == 0){ //faz o zebrado
			echo("<tr bgcolor=#DCDCDC>");
		}
		else{
			echo("<tr bgcolor=#F5F5F5>");
		}
		$cont++;		
		
		echo("	<td>".$ID."</td>
				<td>".$NOME."</td>
			
				</td>
				<td><a href='etapa.php?id=$ID'>
				<img src='inserir.png' title='Adicionar'>
				</a>
				</td>
				<td><a href='tela_altera_etapa.php?id=$ID'>
				<img src='editar.png' title='Editar'>
				</a>
				</td>
				<td><a href='tabelaetapa.php?id=$ID'>
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
