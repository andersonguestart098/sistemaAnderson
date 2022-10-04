<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {

    //Calcular o inicio visualização
    $qnt_result_pg = 40; //Quantidade de registro por página
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuarios = "SELECT id, datahora, vendedor, nropedido, cliente, tipodefaturamento, valordopedido, formapgto, retiraentrega, localdaentrega, localdecobranca, obs1, fretedestacado, valorfrete, dataentrega, operadornf, statusnf, obs2, numeronf, exped, quemrecebeu FROM financeiro ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();


    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {

        $dados = "<div class=table-responsive-lg>
            <table class='table  table table-hover table-bordered'>
                <thead class='table'>
                        <th>ID</th>
                        <th>Registro</th>
                        <th>Vendedor</th>
                        <th>Orçamento</th>
                        <th>Cliente</th>
                        <th>Tipo|Faturamento</th>
                        <th>Valor R$</th>
                        <th>Forma|Pagamento</th>
                        <th>Retira|Entrega|Transp.</th>
                        <th>Local|Entrega</th>
                        <th>Local|Cobrança</th>
                        <th>Observações(1)</th>
                        <th>Tipo|Frete</th>
                        <th>Valor|Frete</th>
                        <th>Data|Entrega</th>
                        <th>Operador|NF</th>
                        <th>Status|NF</th>
                        <th>OBS|Financeiro</th>
                        <th>Número|NF</th>
                        <th>Exped/Log</th>
                        <th>Responsável|NF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);
            
            if($statusnf === 'EMITIDA')
            $cordaLinha = 'bg-success';
            else if($statusnf === 'PENDENTE')
            $cordaLinha = 'bg-warning';
            else if($statusnf === 'CANCELADA')
            $cordaLinha = 'bg-danger';
                        else if($statusnf === 'RETORNOU AO VENDEDOR')
            $cordaLinha = 'bg-info';
            else
            $cordaLinha = '';
            $dados .= "<tr class='$cordaLinha'>
                    <td colspan='0.5' id='valor_id$id'>$id</td>
                    <td id='valor_datahora$id'>$datahora</td>
                    <td id='valor_vendedor$id'>$vendedor</td>
                    <td id='valor_nropedido$id'>$nropedido</td>
                    <td id='valor_cliente$id'>$cliente</td>
                    <td id='valor_tipodefaturamento$id'>$tipodefaturamento</td>
                    <td id='valor_valordopedido$id'>$valordopedido</td>
                    <td id='valor_formapgto$id'>$formapgto</td>
                    <td id='valor_retiraentrega$id'>$retiraentrega</td>
                    <td id='valor_localdaentrega$id'>$localdaentrega</td>
                    <td id='valor_localdecobranca$id'>$localdecobranca</td>
                    <td id='valor_obs1$id'>$obs1</td>
                    <td id='valor_fretedestacado$id'>$fretedestacado</td>
                    <td id='valor_valorfrete$id'>$valorfrete</td>
                    <td id='valor_dataentrega$id'>$dataentrega</td>
                    <td id='valor_operadornf$id'>$operadornf</td>
                    <td id='valor_statusnf$id'>$statusnf</td>
                    <td id='valor_obs2$id'>$obs2</td>
                    <td id='valor_numeronf$id'>$numeronf</td>
                    <td id='valor_exped$id'>$exped</td>
                    <td id='valor_quemrecebeu$id'>$quemrecebeu</td>
                    


                    <td class='d-flex'>                        
                        <button type='button' id='botao_editar$id' class='btn btn-info btn-sm me-1' onclick='editar_registro($id)'>Editar</button>
                        <button type='button' id='botao_salvar$id' class='btn btn-danger btn-sm me-1' onclick='salvar_registro($id)'  style='display: none;'>Salvar</button>
                    </td>
                </tr>";
        }

        $dados .= "</tbody>
        </table>
    </div>";

        //Paginação - Somar a quantidade de usuários
        $query_pg = "SELECT COUNT(id) AS num_result FROM financeiro";
        $result_pg = $conn->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;

        $dados .= '<nav aria-label="Page navigation example"><ul class="pagination pagination-sm justify-content-center">';

        $dados .= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios(1)'>Primeira</a></li>";

        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if ($pag_ant >= 1) {
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_ant)' >$pag_ant</a></li>";
            }
        }

        $dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if ($pag_dep <= $quantidade_pg) {
                $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
            }
        }

        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Última</a></li>";
        $dados .=   '</ul></nav>';

        $retorna = ['status' => true, 'dados' => $dados];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
}

echo json_encode($retorna);
