<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {

    //Calcular o inicio visualização
    $qnt_result_pg = 40; //Quantidade de registro por página
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuarios = "SELECT id, datahora, numeronf, exped, quemrecebeu, statusdep FROM exped2 ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();
    //print_r($result_usuarios);

    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {

        $dados = "<div class=table-responsive-lg>
            <table class='table table-striped table table-hover table-bordered'>
                <thead class='table'>
                        <th>ID</th>
                        <th>Data|Hora</th>
                        <th>Número|NF</th>
                        <th>Exped/Log</th>
                        <th>Responsável|NF</th>
                        <th>Status|dep</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);
            if($statusdep === 'CLIENTE RETIROU')
            $cordaLinha = 'bg-success';
            else if($statusdep === 'AGUARDANDO CLIENTE')
            $cordaLinha = 'bg-warning';
            else if($statusdep === 'EM SEPARACAO')
            $cordaLinha = 'bg-info';
            else if($statusdep === 'PENDENTE')
            $cordaLinha = 'bg-danger';
            else
            $cordaLinha = '';
            $dados .= "<tr class='$cordaLinha'>
                    <td colspan='0.5' id='valor_id$id'>$id</td>
                    <td id='valor_datahora$id'>$datahora</td>
                    <td id='valor_numeronf$id'>$numeronf</td>
                    <td id='valor_exped$id'>$exped</td>
                    <td id='valor_quemrecebeu$id'>$quemrecebeu</td>
                    <td id='valor_statusdep$id'>$statusdep</td>
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
        $query_pg = "SELECT COUNT(id) AS num_result FROM exped2";
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