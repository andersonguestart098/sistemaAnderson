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
    <title>SISTEMA | CEMEAR </title>
</head>
    <a href="home.php">VOLTAR AO HOME</a>
<style>
          table{
            background-color:#ffffe0;
            font-family:Arial;
            color:aliceblue;
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
                    <h4>FINANCEIRO</h4>
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
          <div class="mb-3">
          <label for="vendedor" class="col-form-label">SELECIONE:</label>
          <br>
          <select name="vendedor" id="vendedor" value="vendedor">
          <option value="MARCIA">VENDEDOR</option>
            <option value="MARCIA">MARCIA</option>
            <option value="JONATHAS">JONATHAS</option>
            <option value="LUIS">LUIS</option>
            <option value="FERNANDO">FERNANDO</option>
          </select>
          <br><br>
          <div class="mb-3"> 
            <label for="nropedido" class="col-form-label">NÚMERO DO PEDIDO:</label>
            <input type="text" name="nropedido" class="form-control" id="nropedido"placeholder="Digite o número do orçamento" autocomplete="off" maxlenght="7">
          </div>
          <div class="mb-3"> 
            <label for="cliente" class="col-form-label">NOME DO CLIENTE:</label>
            <input type="text" name="cliente" class="form-control" id="cliente"placeholder="Digite o nome do cliente">
          </div>
          <label for="tipodefaturamento" class="col-form-label">TIPO DE FATURAMENTO:</label>
          <br>
          <select name="tipodefaturamento" id="tipodefaturamento">
            <option value="NORMAL">NORMAL</option>
            <option value="REMESSA FUTURA">REMESSA FUTURA</option>
            <option value="REMESSA PARA TRANSPORTE">REMESSA PARA TRANSPORTE</option>
          </select>
          <br><BR>
          <div class="mb-3"> 
            <label for="valordopedido" class="col-form-label">VALOR DO PEDIDO R$</label>
            <input type="text" name="valordopedido" class="form-control" id="valordopedido">
          </div>
          <br>
          <select name="formapgto" id="formapgto">
            <option value="FORMA DE PAGAMENTO">SELECIONE A FORMA DE PAGAMENTO</option>
            <option value="BOLETO">BOLETO</option>
            <option value="DINHEIRO">DINHEIRO</option>
            <option value="PAGO NA SALA DE VENDAS">PAGO NA SALA DE VENDAS</option>
            <option value="CARTAO CREDITO">CARTAO CREDITO</option>
            <option value="CARTAO DEBITO">CARTAO DEBITO</option>
            <option value="DEPOSITO">DEPOSITO BANCARIO</option>
            <option value="DEPOSITO PROGRAMADO">DEPOSITO PROGRAMADO</option>
            <option value="COBRAR LOCAL">COBRAR LOCAL</option>
            <option value="CHEQUE">CHEQUE</option>
            <option value="VALE">VALE</option>
            <option value="VER OBSERVACOES">VER OBSERVACOES</option>
          </select>
          <br><br>
          <select name="retiraentrega" id="retiraentrega">
            <option value="RETIRA">RETIRA</option>
            <option value="ENTREGA">ENTREGA</option>
            <option value="ENTREGA AGENDADA">AGENDADA</option>
            <option value="TRANSPORTADORA">TRANSPORTADORA</option>
            <option value="AGUARDAR VENDEDOR (entrega)">AGUARDAR VENDEDOR (entrega)</option>
            <option value="TRANSPORTADORA">TRANSPORTADORA</option>
          </select>
          <br><br>
          <div class="mb-3"> 
            <label for="localdaentrega" class="col-form-label">LOCAL DE ENTREGA:</label>
            <input type="text" name="localdaentrega" class="form-control" id="localdaentrega" placeholder="Digite o local da entrega">
          </div>
          <br>
          <label for="localdecobranca" class="col-form-label">SELECIONE O LOCAL DE COBRANÇA:</label>
          <br>
          <select name="localdecobranca" id="localdecobranca">
            <option value="COBRAR NA EMPRESA">COBRAR NA EMPRESA</option>
            <option value="COBRAR NO LOCAL">COBRAR NO LOCAL</option>
            <option value="PAGO NA SALA DE VENDAS">PAGO NA SALA DE VENDAS</option>
            <option value="NENHUM">NENHUM</option>
          </select>
          <br>
          <div class="mb-3"> 
            <label for="obs1" class="col-form-label">OBSERVAÇÃO:</label>
            <input type="text"  name="obs1" class="form-control" id="obs1" value="..." placeholder="Obs...">
          </div>
          <br>
          <select name="fretedestacado" id="fretedestacado">
            <option value="DESTACADO">DESTACADO</option>
            <option value="DILUIDO">DILUIDO</option>
            <div class="mb-3"> 
            <label for="valorfrete" class="col-form-label">VALOR DO FRETE R$:</label>
            <input type="text" name="valorfrete" class="form-control" id="valorfrete" placeholder="Digite o valor do frete">
          </div>
          <br>
          <div class="mb-3"> 
            <label for="dataentrega" class="col-form-label">DATA DA ENTREGA</label>
            <input type="date" name="dataentrega" class="form-control" id="dataentrega">
            <div class="modal-footer">
          <br>
          <div class="mb-3"> 
            <input type="hidden" name="operadornf" class="form-control" id="operadornf" value="ROSI">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="hidden" name="statusnf" class="form-control" id="statusnf" value="PENDENTE">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="hidden" name="obs2" class="form-control" id="obs2" value="...">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="hidden" name="numeronf" class="form-control" id="numeronf" value="...">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="hidden" name="exped" class="form-control" id="exped" value="...">
          </div>
          <br>
          <div class="mb-3"> 
            <input type="hidden" name="quemrecebeu" class="form-control" id="quemrecebeu" value="...">
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
    <script src="js\custom.js"></script>
</body>

</html>