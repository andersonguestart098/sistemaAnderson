<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['datahora'])) {
} elseif (empty($dados['cidade'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['numeronf'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['quemrecebeu'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['codentrega'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['motorista'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['statuslog'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
}else {
    $query_usuario = "INSERT INTO logistica (datahora, cidade, numeronf, quemrecebeu, codentrega, motorista, statuslog) VALUES (:datahora, :cidade, :numeronf, :quemrecebeu, :codentrega, :motorista, :statuslog)"; //se todas array não estiverem escrito corretamente vai retornar um erro 'necessário preencher o campo nome' 
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':datahora', $dados['datahora']);
    $cad_usuario->bindParam(':cidade', $dados['cidade']);
    $cad_usuario->bindParam(':numeronf', $dados['numeronf']);
    $cad_usuario->bindParam(':quemrecebeu', $dados['quemrecebeu']);
    $cad_usuario->bindParam(':codentrega', $dados['codentrega']);
    $cad_usuario->bindParam(':motorista', $dados['motorista']);
    $cad_usuario->bindParam(':statuslog', $dados['statuslog']);
    $cad_usuario->execute();

    if ($cad_usuario->rowCount()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
    }
}

echo json_encode($retorna);