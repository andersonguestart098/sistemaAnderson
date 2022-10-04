<?php
include_once "conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CEMEAR ENVIAR PEDIDOS></title>
</head>
<a href="home.php">VOLTAR AO HOME</a>
<style>
          table{
            background-color:#fff5ea;
            padding:15px;
            border-radius:15px;
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
    background-image: linear-gradient(to right, rgb(17, 54, 71), rgb(20, 147, 220));
    padding:8px;
    border-radius:8px;
    font-family:Times New Roman;
    color:white;
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
                    <h4>FORMULÁRIO LOGÍSTICA</h4>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal"> <!-- o nome cadModal é para não confundir com a aula do professor, mas no meu caso seria 'pedidoModal' pois trata-se de lançamento de pedidos e não de usuarios. -->
                        Enviar pedido
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div id="table" class="col-lg-12">

            </div>
        </div>
    </div>
    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <img src="logo cemear.png.png" alt="200" width="200">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
        <div class="modal-body">
          <form id="cad-usuario-form"> <!-- este seletor será usado no java script (o javascript que vai receber estes dados)-->
        <div class="mb-3"> 
            <label for="datahora" class="col-form-label">REGISTRO</label>
            <input type="datetime-local" name="datahora" class="form-control" id="datahora" autocomplete="on">
        </div>
        <div class="mb-3">
        <label for="cidade" class="col-form-label">CIDADE:</label> 
            <input type="text"  name="cidade" class="form-control" id="cidade" placeholder="Preencha o número da nota...">
          </div>
          <br><br>
          <div class="mb-3">
        <label for="numeronf" class="col-form-label">NÚMERO NF:</label> 
            <input type="text"  name="numeronf" class="form-control" id="numeronf" placeholder="Preencha o número da nota...">
          </div>
          <div class="mb-3">
          <select name="quemrecebeu" id="quemrecebeu" value="quemrecebeu">
            <option value="DIEIMES">DIEIMES</option>
            <option value="CRISTIANO">CRISTIANO</option>
          </select>
          <br>
          <div class="mb-3">
        <label for="codentrega" class="col-form-label">CÓD. ENTREGA:</label> 
            <input type="text"  name="codentrega" class="form-control" id="codentrega" placeholder="Preencha o número da nota...">
          </div>
          <br>
          <label for="motorista" class="col-form-label">MOTORISTA:</label> 
            <input type="text"  name="motorista" class="form-control" id="motorista" placeholder="Preencha o número da nota...">
          </div>
          <br>
          <label for="statuslog" class="col-form-label">STATUS LOG:</label> 
            <input type="text"  name="statuslog" class="form-control" id="statuslog" placeholder="Preencha o número da nota...">
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
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="custom.js\customlog.js"></script>
</body>

</html>