/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");
const cadForm = document.getElementById("cad-usuario-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./list.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();
    console.log(resposta);

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar-usuarios");

        // Somente acessa o IF quando existir o SELETOR ".listar-usuarios"
        if (conteudo) {

            // Enviar os dados para o arquivo HTML
            conteudo.innerHTML = resposta['dados'];
        }
    }
}

// Chamar a funcao para listar os registro do banco de dados
listarUsuarios(1);


//Cadastrar os pedidos
cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    
    const dadosForm = new FormData(cadForm);
    dadosForm.append("add", 1);

    document.getElementById("cad-usuario-btn").value = "Salvando...";
    
    const dados = await fetch("cadastrar.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();
    
    if(resposta['erro']){
        msgAlertaErroCad.innerHTML = resposta['msg'];
    }else{
        msgAlerta.innerHTML = resposta['msg'];
        cadForm.reset();
        cadModal.hide();
        listarUsuarios(1);
    }
    document.getElementById("cad-usuario-btn").value = "Enviar";
});

/* Fim listar os registros do banco de dados */

/* Inicio substituir o texto pelo campo na tabela */
// Funcao responsavel em substituir o texto pelo campo na tabela e receber o ID do registro que sera editado

function editar_registro(id) {
    // Ocultar o botao editar
    document.getElementById("botao_editar" + id).style.display = "none";
    console.log("acessou o editar: " + id);

    // Apresentar o botao salvar
    document.getElementById("botao_salvar" + id).style.display = "block";

    // Recuperar os valores do registro que esta na tabela
    var datahora = document.getElementById("valor_datahora" + id);
    var vendedor = document.getElementById("valor_vendedor" + id);
    var nropedido = document.getElementById("valor_nropedido" + id);
    var cliente = document.getElementById("valor_cliente" + id);
    var tipodefaturamento = document.getElementById("valor_tipodefaturamento" + id);
    var valordopedido = document.getElementById("valor_valordopedido" + id);
    var formapgto = document.getElementById("valor_formapgto" + id);
    var retiraentrega = document.getElementById("valor_retiraentrega" + id);
    var localdaentrega = document.getElementById("valor_localdaentrega" + id);
    var localdecobranca = document.getElementById("valor_localdecobranca" + id);
    var obs1 = document.getElementById("valor_obs1" + id);
    var fretedestacado = document.getElementById("valor_fretedestacado" + id);
    var valorfrete = document.getElementById("valor_valorfrete" + id);
    var dataentrega = document.getElementById("valor_dataentrega" + id);
    var operadornf = document.getElementById("valor_operadornf" + id);
    var statusnf = document.getElementById("valor_statusnf" + id);
    var obs2 = document.getElementById("valor_obs2" + id);
    var numeronf = document.getElementById("valor_numeronf" + id);
    var exped = document.getElementById("valor_exped" + id);
    var quemrecebeu = document.getElementById("valor_quemrecebeu" + id);




    // Substituir o texto pelo campo e atribuir para o campo o valor que estava na tabela
    datahora.innerHTML = "<input type='hidden' id='datahora_text" + id + "' value='" + datahora.innerHTML + "'>";
    vendedor.innerHTML = "<input type='hidden' id='vendedor_text" + id + "' value='" + vendedor.innerHTML + "'>";
    nropedido.innerHTML = "<input type='hidden' id='nropedido_text" + id + "' value='" + nropedido.innerHTML + "'>";
    cliente.innerHTML = "<input type='hidden' id='cliente_text" + id + "' value='" + cliente.innerHTML + "'>";
    tipodefaturamento.innerHTML = "<input type='hidden' id='tipodefaturamento_text" + id + "' value='" + tipodefaturamento.innerHTML + "'>";
    valordopedido.innerHTML = "<input type='hidden' id='valordopedido_text" + id + "' value='" + valordopedido.innerHTML + "'>";
    formapgto.innerHTML = "<input type='hidden' id='formapgto_text" + id + "' value='" + formapgto.innerHTML + "'>";
    retiraentrega.innerHTML = "<input type='hidden' id='retiraentrega_text" + id + "' value='" +retiraentrega.innerHTML + "'>";
    localdaentrega.innerHTML = "<input type='hidden' id='localdaentrega_text" + id + "' value='" + localdaentrega.innerHTML + "'>";
    localdecobranca.innerHTML = "<input type='hidden' id='localdecobranca_text" + id + "' value='" + localdecobranca.innerHTML + "'>";
    obs1.innerHTML = "<input type='hidden' id='obs1_text" + id + "' value='" + obs1.innerHTML + "'>";
    fretedestacado.innerHTML = "<input type='hidden' id='fretedestacado_text" + id + "' value='" + fretedestacado.innerHTML + "'>";
    valorfrete.innerHTML = "<input type='hidden' id='valorfrete_text" + id + "' value='" + valorfrete.innerHTML + "'>";
    dataentrega.innerHTML = "<input type='hidden' id='dataentrega_text" + id + "' value='" + dataentrega.innerHTML + "'>";
    operadornf.innerHTML = "<input type='text' id='operadornf_text" + id + "' value='" + operadornf.innerHTML + "'>";
    statusnf.innerHTML = "<select name='coisa' id='coisa" + id + "'><option value='PENDENTE'>PENDENTE</option><option value='EMITIDA'>EMITIDA</option><option value='CANCELADA'>CANCELADA</option></select>";
    obs2.innerHTML = "<input type='text' id='obs2_text" + id + "' value='" + obs2.innerHTML + "'>";
    numeronf.innerHTML = "<input type='text' id='numeronf_text" + id + "' value='" + numeronf.innerHTML + "'>";
    exped.innerHTML = "<input type='text' id='exped_text" + id + "' value='" + exped.innerHTML + "'>"; //prestar bem atenção se está referenciado o '_text' se não retorna valor nulo 'null'
    quemrecebeu.innerHTML = "<select name='quem' id='quem" + id + "'><option value='MAX'>MAX</option><option value='DUDU'>DUDU</option><option value='TINGA'>TINGA</option> </select>";

}

/* Fim substituir o texto pelo campo na tabela */

/* Inicio editar o registro no banco de dados */
// Funcao resposavel em salvar no banco de dados e receber o id do registro que deve ser editado

async function salvar_registro(id) {
    // Recuperar os valore dos campos
    var datahora_valor = document.getElementById("datahora_text" + id).value;
    var vendedor_valor = document.getElementById("vendedor_text" + id).value;
    var nropedido_valor = document.getElementById("nropedido_text" + id).value;
    var cliente_valor = document.getElementById("cliente_text" + id).value;
    var tipodefaturamento_valor = document.getElementById("tipodefaturamento_text" + id).value;
    var valordopedido_valor = document.getElementById("valordopedido_text" + id).value;
    var formapgto_valor = document.getElementById("formapgto_text" + id).value;
    var retiraentrega_valor = document.getElementById("retiraentrega_text" + id).value;
    var localdaentrega_valor = document.getElementById("localdaentrega_text" + id).value;
    var localdecobranca_valor = document.getElementById("localdecobranca_text" + id).value;
    var obs1_valor = document.getElementById("obs1_text" + id).value;
    var fretedestacado_valor = document.getElementById("fretedestacado_text" + id).value;
    var valorfrete_valor = document.getElementById("valorfrete_text" + id).value;
    var dataentrega_valor = document.getElementById("dataentrega_text" + id).value;
    var operadornf_valor = document.getElementById("operadornf_text" + id).value;
    var statusnf_valor = document.getElementById("coisa" + id).value;
    var obs2_valor = document.getElementById("obs2_text" + id).value;
    var numeronf_valor = document.getElementById("numeronf_text" + id).value;
    var exped_valor = document.getElementById("exped_text" + id).value;
    var quemrecebeu_valor = document.getElementById("quem" + id).value;

    // Prepara a STRING de valores que deve ser enviado para o arquivo PHP responsavel em salvar no banco de dados
    var dadosForm = "id=" + id + "&datahora=" + datahora_valor + "&vendedor=" + vendedor_valor + "&nropedido=" + nropedido_valor + "&cliente=" + cliente_valor + "&tipodefaturamento=" + tipodefaturamento_valor + "&valordopedio=" + valordopedido_valor + "&formapgto=" + formapgto_valor + "&retiraentrega=" + retiraentrega_valor + "&localdaentrega=" + localdaentrega_valor + "&localdecobranca=" + localdecobranca_valor + "&obs1=" + obs1_valor + "&fretedestacado=" + fretedestacado_valor + "&valorfrete=" + valorfrete_valor + "&dataentrega=" + dataentrega_valor + "&operadornf=" + operadornf_valor + "&statusnf=" + statusnf_valor + "&obs2=" + obs2_valor + "&numeronf=" + numeronf_valor + "&exped=" + exped_valor + "&quemrecebeu=" + quemrecebeu_valor;


    // Fazer a requisicao com o FETCH para um arquivo PHP e enviar atraves do metodo POST os dados do formulario
    const dados = await fetch("editar.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: dadosForm
    });

    // Ler o objeto, a resposta do arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao conseguir editar no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Envia a mensagem de sucesso para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        // Chamar a funcao para remover a mensagem apos alguns segundos
        removerMsgAlerta();

        // Substituir os campos pelo texto que estava nos campos
        document.getElementById("valor_datahora" + id).innerHTML = datahora_valor;
        document.getElementById("valor_vendedor" + id).innerHTML = vendedor_valor;
        document.getElementById("valor_nropedido" + id).innerHTML = nropedido_valor;
        document.getElementById("valor_cliente" + id).innerHTML = cliente_valor;
        document.getElementById("valor_tipodefaturamento" + id).innerHTML = tipodefaturamento_valor;
        document.getElementById("valor_valordopedido" + id).innerHTML = valordopedido_valor;
        document.getElementById("valor_formapgto" + id).innerHTML = formapgto_valor;
        document.getElementById("valor_retiraentrega" + id).innerHTML = retiraentrega_valor;
        document.getElementById("valor_localdaentrega" + id).innerHTML = localdaentrega_valor;
        document.getElementById("valor_localdecobranca" + id).innerHTML = localdecobranca_valor;
        document.getElementById("valor_obs1" + id).innerHTML = obs1_valor;
        document.getElementById("valor_obs" + id).innerHTML = obs_valor;
        document.getElementById("valor_obs3" + id).innerHTML = obs3_valor;
        document.getElementById("valor_fretedestacado" + id).innerHTML = fretedestacado_valor;
        document.getElementById("valor_valorfrete" + id).innerHTML = valorfrete_valor;
        document.getElementById("valor_dataentrega" + id).innerHTML = dataentrega_valor;
        document.getElementById("valor_operadornf" + id).innerHTML = operadornf_valor;
        document.getElementById("valor_statusnf" + id).innerHTML = statusnf_valor;
        document.getElementById("valor_obs2" + id).innerHTML = obs2_valor;
        document.getElementById("valor_numeronf" + id).innerHTML = numeronf_valor; //se não colocar '_valor' ele até salva mas não oculta o botão salvar!
        document.getElementById("valor_exped" + id).innerHTML = exped_valor;
        document.getElementById("valor_quemrecebeu" + id).innerHTML = quemrecebeu_valor;

        // Apresentar o botao editar
        document.getElementById("botao_editar" + id).style.display = "block";

        // Ocultar o botao salvar
        document.getElementById("botao_salvar" + id).style.display = "none";
    }
}

/* Fim editar o registro no banco de dados */

/* Inicio remover a mensagem em 5 segundos apos apresentar a mensagem para o usuario */
function removerMsgAlerta() {
    setTimeout(function () {
        // Substituir a mensagem
        document.getElementById("msgAlerta").innerHTML = "";
    }, 5000);
}
/* Fim remover a mensagem em 5 segundos apos apresentar a mensagem para o usuario */