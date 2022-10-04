<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['datahora'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo vendedor!</div>"];
} elseif (empty($dados['vendedor'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['nropedido'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nropedido!</div>"];
}elseif (empty($dados['cliente'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo formapgto!</div>"];
} elseif (empty($dados['tipodefaturamento'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo retiraentrega!</div>"];
} elseif (empty($dados['valordopedido'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo statusnf!</div>"];
} elseif (empty($dados['formapgto'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['retiraentrega'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['localdaentrega'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['localdecobranca'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['obs1'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['fretedestacado'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['valorfrete'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['dataentrega'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['operadornf'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['statusnf'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['obs2'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['numeronf'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['exped'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['quemrecebeu'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
}else {
    $query_usuario = "INSERT INTO financeiro (datahora, vendedor, nropedido, cliente, tipodefaturamento, valordopedido, formapgto, retiraentrega, localdaentrega, localdecobranca, obs1, fretedestacado, valorfrete, dataentrega, operadornf, statusnf, obs2, numeronf, exped, quemrecebeu) VALUES (:datahora, :vendedor, :nropedido, :cliente, :tipodefaturamento, :valordopedido, :formapgto, :retiraentrega, :localdaentrega, :localdecobranca, :obs1, :fretedestacado, :valorfrete, :dataentrega, :operadornf, :statusnf, :obs2, :numeronf, :exped, :quemrecebeu)"; //se todas array não estiverem escrito corretamente vai retornar um erro 'necessário preencher o campo nome' 
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':datahora', $dados['datahora']);
    $cad_usuario->bindParam(':vendedor', $dados['vendedor']);
    $cad_usuario->bindParam(':nropedido', $dados['nropedido']);
    $cad_usuario->bindParam(':cliente', $dados['cliente']);
    $cad_usuario->bindParam(':tipodefaturamento', $dados['tipodefaturamento']);
    $cad_usuario->bindParam(':valordopedido', $dados['valordopedido']);
    $cad_usuario->bindParam(':formapgto', $dados['formapgto']);
    $cad_usuario->bindParam(':retiraentrega', $dados['retiraentrega']);
    $cad_usuario->bindParam(':localdaentrega', $dados['localdaentrega']);
    $cad_usuario->bindParam(':localdecobranca', $dados['localdecobranca']);
    $cad_usuario->bindParam(':obs1', $dados['obs1']);
    $cad_usuario->bindParam(':fretedestacado', $dados['fretedestacado']);
    $cad_usuario->bindParam(':valorfrete', $dados['valorfrete']);
    $cad_usuario->bindParam(':dataentrega', $dados['dataentrega']);
    $cad_usuario->bindParam(':operadornf', $dados['operadornf']);
    $cad_usuario->bindParam(':statusnf', $dados['statusnf']);
    $cad_usuario->bindParam(':obs2', $dados['obs2']);
    $cad_usuario->bindParam(':numeronf', $dados['numeronf']);
    $cad_usuario->bindParam(':exped', $dados['exped']);
    $cad_usuario->bindParam(':quemrecebeu', $dados['quemrecebeu']);
    $cad_usuario->execute();

    if ($cad_usuario->rowCount()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
    }
}

echo json_encode($retorna);