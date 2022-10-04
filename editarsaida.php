<?php
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o id!</div>"];
}elseif (empty($dados['codentrega'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar datahora!</div>"];
}elseif (empty($dados['conferente'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o numeronf!</div>"];
}elseif (empty($dados['numeronf'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o exped!</div>"];
}elseif (empty($dados['motorista'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o quemrecebeu!</div>"];
}elseif (empty($dados['placa'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o codentrega!</div>"];
}elseif (empty($dados['cidadedestino'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o motorista!</div>"];
}elseif (empty($dados['hodometrosaida'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o statuslog!</div>"];
}elseif (empty($dados['datahorasaida'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o statuslog!</div>"];
}elseif (empty($dados['obs'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o statuslog!</div>"];
}else {
    $query_usuario = "UPDATE saida SET codentrega=:codentrega, conferente=:conferente, numeronf=:numeronf, motorista=:motorista, placa=:placa, cidadedestino=:cidadedestino, hodometrosaida=:hodometrosaida, datahorasaida=:datahorasaida, obs=:obs WHERE id=:id"; //nunca bagunçar essa porra de função se não ele não altera no banco de dados
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':codentrega', $dados['codentrega']);
    $edit_usuario->bindParam(':conferente', $dados['conferente']);
    $edit_usuario->bindParam(':numeronf', $dados['numeronf']);
    $edit_usuario->bindParam(':motorista', $dados['motorista']);
    $edit_usuario->bindParam(':placa', $dados['placa']);
    $edit_usuario->bindParam(':cidadedestino', $dados['cidadedestino']);
    $edit_usuario->bindParam(':hodometrosaida', $dados['hodometrosaida']);
    $edit_usuario->bindParam(':datahorasaida', $dados['datahorasaida']);
    $edit_usuario->bindParam(':obs', $dados['obs']);
    $edit_usuario->bindParam(':id', $dados['id']);

    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o e-mail!</div>"];
    }    
}

echo json_encode($retorna);
