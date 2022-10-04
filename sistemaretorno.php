<?php
include_once "conexao.php";
session_start();
ob_start();

if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
require("conexao.php");
$adm = $_SESSION["usuario"][1];
$nome = $_SESSION["usuario"][0];
}else{
	echo "<script>window.location = 'home.php'</script>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<link rel="icon" href="Ícone-C-de-Cemear-transparente.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>RETORNO LOGÍSTICA | CEMEAR </title>
</head>
    <a href="home.php">VOLTAR AO HOME</a>
<style>
          table{
            background-color:#f0f5f6;
            font-family:Arial;
            padding:15px;
            border-radius:15px;
            margin: 3rem auto;
        }
  thead{
    background-color:whitesmoke;
  }
  body{
  font-family: Arial, Helvetica, sans-serif;
  color: black;
  size: 18pt;
  text-emphasis-color: white;
  text-align:center;
  background-image:url(https://static.wixstatic.com/media/2fbcb5_d276e2a6abc54c47befd5d1a5137a5ab~mv2.jpg);
  background-size:1430px
        }
  .table-bg{
   background: rgba(0, 0, 0, 0.8);
   border-radius: 15px 15px 0 0;
        }
  a{
  color:white;
  padding:15px;
        }
  h1{
  color:black;
        }
  h5{
  color:#323232;
        }
  h4{
    font-family:Times, serif;  
  color:white;
  background-image: linear-gradient(to right, rgb(17, 54, 71), rgb(20, 147, 220));
  padding:15px;
  border-radius:8px;
        }
  form{
    background-color: whitesmoke;
  font-family: Arial, Helvetica, sans-serif;
  color: #1c5d8e;
        }
    </style>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div>
                    <h4>RETORNO LOGÍSTICA</h4>
                </div>
            </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div id="table" class="col-lg-12">

            <span class="listar-usuarios"></span> <!-- span é usado para setar os dados do list(ele que trás os dados para a tabela) -->

            </div>
        </div>
    </div>
    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadUsuarioModalLabel">ENVIAR PEDIDO PARA FINANCEIRO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="cad-usuario-form"> <!-- este seletor será usado no java script (o javascript que vai receber estes dados)-->
      <div class="mb-3"> 
            <label for="datahora" class="col-form-label">REGISTRO</label>
            <input type="datetime-local" name="datahora" class="form-control" id="datahora" autocomplete="on">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="text" name="numeronf" class="form-control" id="numeronf" value="...">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="text" name="exped" class="form-control" id="exped" value="...">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="text" name="motorista" class="form-control" id="quemrecebeu" value="...">
          </div>
          <div class="mb-3"> 
            <input type="text" name="placa" class="form-control" id="placa" value="...">
          </div>
          <div class="mb-3"> 
            <input type="text" name="statuslog" class="form-control" id="statuslog" value="AGUARDANDO ROTA">
          </div>
          <br>
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button> <!-- isso era um type button virou um input -->     <!-- cuidar muito bem o posicionamento das DIV'S no FORM pois dá erro no javascript! foi motivo de alguma raiva passada hoje 31/08 kkkkk -->
        <input type="submit" class="btn btn-outline-success"
         id="cad-usuario-btn" value="Enviar" /> 
          </div>
        </form>
        </div>
        <hr>

        <!-- SELETOR "msgAlerta" responsavel em receber a mensagem de sucesso ou erro -->
        <span id="msgAlerta"></span>

        <div class="row">
            <div class="col-lg-12">
                <!-- SELETOR "listar-usuarios" responsavel em receber os registros do banco de dados -->
                <span class="listar-usuarios"></span>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="custom.js\customretorno.js"></script>
</body>

</html>