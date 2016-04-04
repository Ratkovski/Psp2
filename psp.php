<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
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
  
  
  
  <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3>Cadastro PSP</h3>
                <form name="sentMessage" id="contactForm"  action="gravarpsp.php" method="POST" >
                <div class="control-group form-group">
                <div class="controls">
                <label>Horas Planejamento:</label>
                <input type="text" class="form-control" id="name" size="2" name="horas_planejamento" >
                <p class="help-block"></p>
                </div>
                </div>
                <div class="control-group form-group">
                <div class="controls">
                <label>Horas Realizadas:</label>
                <input type="text" class="form-control" id="name" name="horas_realizado" >
                </div>
                </div>
                <div class="control-group form-group">
                <div class="controls">
                <label>Data Entega:</label>
                <input type="date" class="form-control" id="name"  name="data_entrega">
                </div>
                </div>
                <div class="input-group">
	            <label>Concluido:</label><br>
      
                <input type="radio" aria-label="..." name="concluido" value="sim">Sim
		        <input type="radio" aria-label="..."name="concluido" value="nao">Não

<!-- Search box End -->
   
 
 <div class="control-group form-group">
 <div class="controls">
<label>Responsavel:</label>
<select name='pessoa_id' class="form-control" id="name"  >					
<?php
         error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
		
		$SQL = "SELECT * FROM pessoa";
		
		$resultado = mysql_query($SQL) or die ("Falha na Execução da consulta!");
		
		while ($linha = mysql_fetch_assoc($resultado))
		{
			$ID = $linha['id'];
			$NOME_PESSOA = $linha['nome_pessoa'];
			
			echo("<option value='$ID'>$NOME_PESSOA</option>");
		}
		print_r($resultado)
		?>          
        </select> 
		</div>
        </div>
		
		 <div class="control-group form-group">
 <div class="controls">
<label>ID Etapa:</label>
<select name='etapa_id' class="form-control" id="name"  >					
<?php
         error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
		
		$SQL = "SELECT * FROM etapa";
		
		$resultado = mysql_query($SQL) or die ("Falha na Execução da consulta!");
		echo ($SQL);
		while ($linha = mysql_fetch_assoc($resultado))
		{
		
			$ID = $linha['id'];
			$NOME_ETAPA = $linha['nome_etapa'];
			
			echo("<option value='$ID'>$NOME_ETAPA</option>");
		}
		?>          
        </select> 
		</div>
        </div>

		
		 <div class="control-group form-group">
 <div class="controls">

<label>ID Pessoa:</label>
<select name='pessoa_id' class="form-control" id="name"  >					
<?php
         error_reporting(0);
		$link = mysql_connect ( "localhost",
	   "root",
	   "40818")or die ("Não foi possivel conectar ao BD");
			
		mysql_select_db("mydb2") or die ("Não foi possível selecionar o Banco de Dados!");
		
		$SQL = "SELECT * FROM pessoa";
		
		$resultado = mysql_query($SQL) or die ("Falha na Execução da consulta!");
		
		while ($linha = mysql_fetch_assoc($resultado))
		{
			$ID = $linha['id'];
			$NOME_PESSOA = $linha['nome_pessoa'];
			
			echo("<option value='$ID'>$NOME_PESSOA</option>");
		}
		?>          
        </select> 
		</div>
        </div>
		
				
					   </form> 
                    
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Enviar</button>
					   <button type="reset" class="btn btn-primary">Limpar</button>
            
            </div>

        </div>
  
  </div>
  

  
        
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright PSP- FUnC-Mafra-SC © 2015 Andreza Apª Hau Ratkovski.</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
