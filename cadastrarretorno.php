<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['datahora'])) {
} elseif (empty($dados['codentrega'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['motorista'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['hodometro'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['datahora'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
} elseif (empty($dados['obs'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo quemrecebeu!</div>"];
}else {
    $query_usuario = "INSERT INTO retorno (codentrega, motorista, hodometro, datahora, obs) VALUES (:codentrega, :motorista, :hodometro, :datahora, :obs)"; //se todas array não estiverem escrito corretamente vai retornar um erro 'necessário preencher o campo nome' 
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':codentrega', $dados['codentrega']);
    $cad_usuario->bindParam(':motorista', $dados['motorista']);
    $cad_usuario->bindParam(':hodometro', $dados['hodometro']);
    $cad_usuario->bindParam(':datahora', $dados['datahora']);
    $cad_usuario->bindParam(':obs', $dados['obs']);
    $cad_usuario->execute();

    if ($cad_usuario->rowCount()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
    }
}

echo json_encode($retorna);