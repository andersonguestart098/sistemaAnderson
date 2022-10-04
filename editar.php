<?php
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o id!</div>"];
}elseif (empty($dados['datahora'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar datahora!</div>"];
}elseif (empty($dados['vendedor'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o vendedor!</div>"];
}elseif (empty($dados['nropedido'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o nropedido!</div>"];
}elseif (empty($dados['cliente'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o cliente!</div>"];
}elseif (empty($dados['tipodefaturamento'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o tipodefaturamento!</div>"];
}elseif (empty($dados['valordopedido'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o valordopedido!</div>"];
}elseif (empty($dados['formapgto'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o formapgto!</div>"];
}elseif (empty($dados['retiraentrega'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o retiraentrega!</div>"];
}elseif (empty($dados['localdaentrega'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o localdaentrega!</div>"];
}elseif (empty($dados['localdecobranca'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o localdecobranca!</div>"];
}elseif (empty($dados['obs1'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o obs1!</div>"];
}elseif (empty($dados['fretedestacado'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o fretedestacado!</div>"];
}elseif (empty($dados['valorfrete'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o valorfrete!</div>"];
}elseif (empty($dados['dataentrega'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o dataentrega!</div>"];
}elseif (empty($dados['operadornf'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o operadornf!</div>"];
}elseif (empty($dados['statusnf'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o statusnf!</div>"];
}elseif (empty($dados['obs2'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o obs2!</div>"];
}elseif (empty($dados['numeronf'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o numeronf!</div>"];
}elseif (empty($dados['exped'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o exped!</div>"];
}elseif (empty($dados['quemrecebeu'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o quemrecebeu!</div>"];
}else {
    $query_usuario = "UPDATE financeiro SET datahora=:datahora, vendedor=:vendedor, nropedido=:nropedido, cliente=:cliente, tipodefaturamento=:tipodefaturamento, valordopedido=:valordopedido, formapgto=:formapgto, retiraentrega=:retiraentrega, localdaentrega=:localdaentrega, localdecobranca=:localdecobranca, obs1=:obs1, fretedestacado=:fretedestacado, valorfrete=:valorfrete, dataentrega=:dataentrega, operadornf=:operadornf, statusnf=:statusnf, obs2=:obs2, numeronf=:numeronf, exped=:exped, quemrecebeu=:quemrecebeu WHERE id=:id"; //nunca bagunçar essa porra de função se não ele não altera no banco de dados
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':datahora', $dados['datahora']);
    $edit_usuario->bindParam(':vendedor', $dados['vendedor']);
    $edit_usuario->bindParam(':nropedido', $dados['nropedido']);
    $edit_usuario->bindParam(':cliente', $dados['cliente']);
    $edit_usuario->bindParam(':tipodefaturamento', $dados['tipodefaturamento']);
    $edit_usuario->bindParam(':valordopedido', $dados['valordopedido']);
    $edit_usuario->bindParam(':formapgto', $dados['formapgto']);
    $edit_usuario->bindParam(':retiraentrega', $dados['retiraentrega']);
    $edit_usuario->bindParam(':localdaentrega', $dados['localdaentrega']);
    $edit_usuario->bindParam(':localdecobranca', $dados['localdecobranca']);
    $edit_usuario->bindParam(':obs1', $dados['obs1']);
    $edit_usuario->bindParam(':fretedestacado', $dados['fretedestacado']);
    $edit_usuario->bindParam(':valorfrete', $dados['valorfrete']);
    $edit_usuario->bindParam(':dataentrega', $dados['dataentrega']);
    $edit_usuario->bindParam(':operadornf', $dados['operadornf']);
    $edit_usuario->bindParam(':statusnf', $dados['statusnf']);
    $edit_usuario->bindParam(':obs2', $dados['obs2']);
    $edit_usuario->bindParam(':numeronf', $dados['numeronf']);
    $edit_usuario->bindParam(':exped', $dados['exped']);
    $edit_usuario->bindParam(':quemrecebeu', $dados['quemrecebeu']);
    $edit_usuario->bindParam(':id', $dados['id']);

    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o e-mail!</div>"];
    }    
}

echo json_encode($retorna);
