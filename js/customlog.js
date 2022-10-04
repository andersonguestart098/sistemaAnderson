/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");
const cadForm = document.getElementById("cad-usuario-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./listlog.php?pagina=" + pagina);

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
    
    const dados = await fetch("cadastrarlog.php", {
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
    var cidade = document.getElementById("valor_cidade" + id);
    var numeronf = document.getElementById("valor_numeronf" + id);
    var quemrecebeu = document.getElementById("valor_quemrecebeu" + id);
    var codentrega = document.getElementById("valor_codentrega" + id);
    var motorista = document.getElementById("valor_motorista" + id);
    var statuslog = document.getElementById("valor_statuslog" + id);





    // Substituir o texto pelo campo e atribuir para o campo o valor que estava na tabela
    datahora.innerHTML = "<input type='hidden' id='datahora_text" + id + "' value='" + datahora.innerHTML + "'>";
    cidade.innerHTML = "<input type='text' id='cidade_text" + id + "' value='" + cidade.innerHTML + "'>";
    numeronf.innerHTML = "<input type='text' id='numeronf_text" + id + "' value='" + numeronf.innerHTML + "'>"; //prestar bem atenção se está referenciado o '_text' se não retorna valor nulo 'null'
    quemrecebeu.innerHTML = "<select name='quem' id='quem" + id + "'><option value='MANOEL'>MANOEL</option><option value='CRISTIANO'>CRISTIANO</option><option value='TINGA'>MATHEUS</option> </select>";
    codentrega.innerHTML = "<input type='text' id='codentrega_text" + id + "' value='" + codentrega.innerHTML + "'>";
    motorista.innerHTML = "<input type='text' id='motorista_text" + id + "' value='" + motorista.innerHTML + "'>";
    statuslog.innerHTML = "<input type='text' id='statusdep_text" + id + "' value='" + statuslog.innerHTML + "'>";


}

/* Fim substituir o texto pelo campo na tabela */

/* Inicio editar o registro no banco de dados */
// Funcao resposavel em salvar no banco de dados e receber o id do registro que deve ser editado

async function salvar_registro(id) {
    console.log();
    // Recuperar os valore dos campos
    var datahora_valor = document.getElementById("datahora_text" + id).value;
    var cidade_valor = document.getElementById("cidade_text" + id).value;
    var numeronf_valor = document.getElementById("numeronf_text" + id).value;
    var quemrecebeu_valor = document.getElementById("quem" + id).value;
    var codentrega_valor = document.getElementById("codentrega_text" + id).value;
    var motorista_valor = document.getElementById("motorista_text" + id).value;
    var statuslog_valor = document.getElementById("statuslog_text" + id).value;

    // Prepara a STRING de valores que deve ser enviado para o arquivo PHP responsavel em salvar no banco de dados
    var dadosForm = "id=" + id + "&datahora=" + datahora_valor + "&cidade=" + cidade_valor + "&numeronf=" + numeronf_valor +  "&quemrecebeu=" + quemrecebeu_valor +  "&codentrega=" + codentrega_valor +  "&motorista=" + motorista_valor +  "&statuslog=" + statuslog_valor ;


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
        document.getElementById("valor_cidade" + id).innerHTML = cidade_valor; //se não colocar '_valor' ele até salva mas não oculta o botão salvar!
        document.getElementById("valor_quemrecebeu" + id).innerHTML = quemrecebeu_valor;
        document.getElementById("valor_codentrega" + id).innerHTML = codentrega_valor;
        document.getElementById("valor_motorista" + id).innerHTML = motorista_valor;
        document.getElementById("valor_statuslog" + id).innerHTML = statuslog_valor;

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