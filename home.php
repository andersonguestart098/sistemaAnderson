<?php
session_start();

if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
$adm = $_SESSION["usuario"][1];
$nome = $_SESSION["usuario"][0];
}else{
	echo "<script>window.location = 'fazerlogin.php'</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="Ícone-C-de-Cemear-transparente.ico">  	
	<meta http-equiv="content-type" content="text/html; charset=utf-8">  	
	<title>CEMEAR</title> 
</head>
<a href="logout.php">Sair</a>
<style>
    body  {  	
    background-image:url(_MG_3854.JPG);
    background-size:1430px;
	margin: 0;  	
	padding: 0;  	 
	font: 85% arial, hevetica, sans-serif;
	text-align: center;
	color:white;
} 

h1{
    color:gray;
}

a:link { color: lightblue; }
a:visited { color: #b93411; }
a:focus { color: #000; }
a:hover { color: #7d8206; }
a:active { color: black; }

h2 {
	color: #B52C07;
	font: 140% georgia, times, "times new roman", serif;
	}
	
h2 a { text-decoration: none; }

h3 {
	color: #7d8206;
	font: 110% georgia, times, "times new roman", serif;
	}	

#container  {  	
	margin: 1em auto;  	
	width: 650px;  	
	background: lightblue;  
	text-align: left;
	border: 1px solid blue;
}

#header {
	background: lightblue;
	height: 45px;
	width: 100%;
	position: relative;
	/* background: url(header.jpg) no-repeat 0 0; */
	border-bottom: 1px solid #fff;
	}  	
	
#header h1 {
	position: absolute;
	left: -500em;
	}
	
#skipmenu {
	position: absolute;
	left: 0;
	top: 5px;
	width: 645px;
	text-align: right;
	}

#skipmenu a {
	color: #555;
	text-decoration: none;
	}
	
#mainnav {
    background: snow;
    color: lightblue;
    padding: 20px 0;
    margin-bottom: 5px;
}
 #mainnav ul {
	margin: 0 0 0 20px;
	padding: 0;
	list-style-type: none;
	border-left: 1px solid #C4C769;
	}

#mainnav li {
	display: inline;
	padding: 0 10px;
	border-right: 1px solid blue;
	}

#mainnav li a {
	text-decoration: none;
	color: #272900;
	}

#mainnav li a:hover {
	text-decoration: none;
	color: #fff;
	background-color: blue;
	}
	
	
#menu  {  		
    float: left;
    width: 193px;
    background: whitesmoke;
    border-left: 1px white;
    padding-left: 15px;
}  

#menu ul {
	margin: 1em 0;
	padding: 0;
	}

#menu ul li {
	margin: 0 0 1em;
	padding: 0;
	list-style-type: none;
	}

#contents  { 
    float: left;
    width: 950px;
    background-color:whitesmoke;

	}   

#contents p { line-height: 165%; }	

.blogentry { border-bottom: 1px solid #C5C877; }

.blogentry ul {
	text-align: right;
	margin: 1em 0;
	padding: 0;
	font-size: 95%;
	}

.blogentry li {
	list-style-type: none;
	display: inline;
	margin: 0;
	padding: 0 0 0 5px;
		}

.imagefloat {
	float: right;
	padding: 1px;
	border: 1px solid #9FA41D;
	margin: 0 0 15px 15px;
	}
	
#footer  {  	
	clear: both;
	color: blue;
	text-align: right;
	font-size: 90%;
	background: lightblue;
	padding: 5px;
	}
    body  {  	
	margin: 0;  	
	padding: 0;  	
	background-image:url(https://static.wixstatic.com/media/2fbcb5_d276e2a6abc54c47befd5d1a5137a5ab~mv2.jpg);
	background-size:1300px;
	width:100%; 
	font: 85% arial, hevetica, sans-serif;
	text-align: center;
	color: blue;
} 

a:link { 
	background-color:#1c5d9b;
	padding: 5px;
	border-radius: 5px;
	color: white;
 }
a:visited { color: white; }
a:focus { color: white; }
a:hover { color: dodgerblue; }
a:active { color: white;  }

h2 {
	color: blue;
	font: 140% georgia, times, "times new roman", serif;
	}
	
h2 a { text-decoration: none; }

h3 {
	color: blue;
	font: 110% georgia, times, "times new roman", serif;
	}	

#container  {
    margin: 4rem auto;
    width: 1180px;
    background: lightblue;
    text-align: left;
    border: 8px solid whitesmoke;
	border-radius:10px;
}

#header {
	background: lightblue;
	height: 45px;
	width: 100%;
	position: 100%;
	/* background: url(header.jpg) no-repeat 0 0; */
	border-bottom: 1px solid lightblue;
	}  	
	
#header h1 {
	position: absolute;
	left: -500em;
	}
	
#skipmenu {
	position: absolute;
	left: 0;
	top: 5px;
	width: 645px;
	text-align: right;
	}

#skipmenu a {
	color: dodgerblue;
	text-decoration: none;
	}
	
#mainnav {background: whitesmoke;
	color: lightblue;
	padding: 10px 0;
	margin-bottom: 22px;
 }
 
 #mainnav ul {
	margin: 0 0 0 20px;
	padding: 0;
	list-style-type: none;
	border-left: 1px solid #C4C769;
	}

#mainnav li {
	display: inline;
	padding: 0 10px;
	border-right: 1px black;
	}

#mainnav li a {
	text-decoration: none;
	color: whitesmoke;
	}

#mainnav li a:hover {
	text-decoration: none;
	color: blue;
	background-color: gray;
	}
	
	
#menu  {  		
	float: right;  	
	width: 186px;  	
	/*background: #6F9;  */
	border-left: 1px solid #C5C877;
	padding-left: 15px;
}  

#menu ul {
	margin: 2em 0;
	padding: 0;
	}

#menu ul li {
	margin: 0 0 2em;
	padding: 5PX;	
	list-style-type: none;
	}

#contents  {  	
	float: left;  	
	width: 950px;  	
	background: white;  	
	margin: 0 0 0 20px;  	
	}   

#contents p { line-height: 165%; }	

.blogentry { border-bottom: 1px solid #C5C877; }

.blogentry ul {
	text-align: right;
	margin: 1em 0;
	padding: 0;
	font-size: 95%;
	}

.blogentry li {
	list-style-type: none;
	display: inline;
	margin: 0;
	padding: 0 0 0 7px;
		}

.imagefloat {
	float: right;
	padding: 15px;
	border: 3px none;
	margin: 0 0 10px 10px;
	}
	
#footer  {  	
	clear: both;
	color: #272900;
	text-align: right;
	font-size: 90%;
	background: lightblue;
	padding: 5px;
	}
</style>
<body>
<?php
        //echo "<h1>Bem-vindo(a) <u>$logado !</u></h1>";
    ?>
<div id="container">
	<div id="header">
	    <img src="logo cemear.png (1).png" alt="200" width="200">
		<div id="skipmenu">
			
		</div>  		
		<h1>SISTEMA</h1>
	</div>
	<div id="mainnav">
		<ul>  			
            <li><a href="sistema.php">TABELA FINANCEIRO</a></li>
            <li><a href="sistemaexped.php">TABELA EXPEDIÇÃO 1 </a></li>
            <li><a href="sistemaexpeddois.php">TABELA EXPEDIÇÃO 2</a></li>
            <li><a href="sistemalog.php">TABELA LOGÍSTICA</a></li>
			<li><a href="sistemasaida.php">TABELA SAÍDA CAMINHÃO</a></li>
			<li><a href="sistemaretorno.php">TABELA RETORNO</a></li>	
		</ul>  
	</div>
	<div id="menu">
		<h3>FORMULÁRIOS</h3>  		
		<ul>  			
			<li><a href="formularioexpedum.php">EXPEDIÇÃO 1</a></li>  			
			<li><a href="formularioexpeddois.php">EXPEDIÇÃO 2</a></li>
			<li><a href="enviarpedidos.php">FINANCEIRO</a></li>
			<li><a href="formulariolog.php">LOGÍSTICA </a></li>
			<li><a href="formulariosaida.php">SAÍDA DO CAMINHÃO</a></li>  			
			<li><a href="formularioretorno.php">RETORNO </a></li>
			
		</ul>  		
		<h3>EXEMPLO</h3>  		
		<ul>  			
			<li><a href="#">INFO</a></li>  			
			<li><a href="#">INFO</a></li> 	
			<li><a href="#">INFO</a></li>  			
			<li><a href="#">INFO</a></li>  		
		</ul>   
	</div>
	<div id="contents">
		<div class="blogentry">  					
		<video src="drywall.mp4" alt="850" width="915" controls loop autoplay=1 >
    <a href="rabbit320.webm">link to the video</a> instead.</p> 
    </video> 						
		</div>
	</div>
	<div id="footer">
		Copyright © CEMEAR 2022
	</div>
	<!--src="1661546494747_image.png" alt="850" width="915"-->
</div>
</body>