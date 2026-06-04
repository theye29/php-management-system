
if (document.getElementById('incpf')) {
    document.getElementById('incpf').focus;
}




function mostrarprocessando() {
    var divprocessando = document.createElement('div');
    divprocessando.id = "processandodiv";
    divprocessando.style.position = "fixed";
    divprocessando.style.top = "50%";
    divprocessando.style.left = "50%";
    divprocessando.style.transform = 'translate(-50%, -50%)';
    divprocessando.innerHTML = '<img src="./img/processando.gif" width="150px" alt="carregando" title="carregando">';
    document.body.appendChild(divprocessando);
}
function esconderprocessando() {
    var divprocessando = document.getElementById('processandodiv');
    if (divprocessando) {
        document.body.removeChild(divprocessando); ''
    }
}

function fazerlogin() {
    var cpf = document.getElementById('incpf').value;
    var senha = document.getElementById('insenha').value;
    var erromsg = document.getElementById('erromsg');
    var qntdsenha = senha.length;
    if (cpf === "" && senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'cpf e senha vazios, por favor preencha os campos.';
        return;
    }
    if (cpf === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'cpf vazio, por favor preencha o campo.';
        return;
    }
    if (senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha vazia, por favor preencha o campo.';
        return;
    }
    if (qntdsenha < 8) {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha deve conter no minimo 8 digitos.';
        return;

    }

    mostrarprocessando();

    fetch('logar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'cpf=' + encodeURIComponent(cpf) + "&senha=" + encodeURIComponent(senha),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {

                erromsg.classList.remove('alert-danger');
                erromsg.classList.add('alert-success');
                erromsg.innerHTML = data.message;
                erromsg.style.display = 'block';
                setTimeout(function () {

                    window.location.href = 'principal.php'
                    esconderprocessando();
                    erromsg.style.display = 'none';
                }, 800);

            } else {

                esconderprocessando();
                erromsg.classList.remove('alert-success');
                erromsg.classList.add('alert-danger');
                erromsg.style.display = 'block';
                erromsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição', error)
        });
}

function fazercadastro() {
    var cpf = document.getElementById('incpf').value;
    var senha = document.getElementById('insenha').value;
    var usuario = document.getElementById('inusuario').value;
    var erromsg = document.getElementById('erromsg');

    var qntdsenha = senha.length;
    var qntdcpf = cpf.length;
    if (cpf === "" && senha === "" && usuario === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'usuario, cpf e senha vazios, por favor preencha os campos.';
        return;
    }
    if (cpf === "" && senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'cpf e senha vazios, por favor preencha os campos.';
        return;
    }
    if (usuario === "" && senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Usuario e senha vazios, por favor preencha os campos.';
        return;
    }
    if (usuario === "" && senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Usuario e cpf vazios, por favor preencha os campos.';
        return;
    }
    if (usuario === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Usuario vazio, por favor preencha o campo.';
        return;
    }
    if (cpf === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'cpf vazio, por favor preencha o campo.';
        return;
    }
    if (senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha vazia, por favor preencha o campo.';
        return;
    }
    if (qntdsenha < 8) {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha deve conter no minimo 8 digitos.';
        return;

    }
    if (qntdcpf != 11) {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Cpf deve conter exatamente 11 digitos.';
        return;
    }

    mostrarprocessando();

    fetch('cadastro.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'usuario=' + encodeURIComponent(usuario)  + '&cpf=' + encodeURIComponent(cpf) + "&senha=" + encodeURIComponent(senha),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {

                erromsg.classList.remove('alert-danger');
                erromsg.classList.add('alert-success');
                erromsg.innerHTML = data.message;
                erromsg.style.display = 'block';
                setTimeout(function () {

                    window.location.href = 'index.php'
                    esconderprocessando();
                    erromsg.style.display = 'none';
                }, 800);

            } else {

                esconderprocessando();
                erromsg.classList.remove('alert-success');
                erromsg.classList.add('alert-danger');
                erromsg.style.display = 'block';
                erromsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição', error)
        });
}
function carregarConteudo(controle) {

    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('conteudo').innerHTML = data;
        })
        .catch(error => console.error('Erro na requisição:', error));
}



const modaladdcliente = document.getElementById('modaladdcliente');
const idclienteadd = document.getElementById('idclienteadd');
const btnadicionarcliente = document.getElementById("btnadicionarcliente");

const modalcomprarservico = document.getElementById('modalcomprarservico');
const idservicocomprar = document.getElementById('idservicocomprar');
const btncomprarservico = document.getElementById("btncomprarservico");

const modaladdservico = document.getElementById('modaladdservico');
const idservicoadd = document.getElementById('idservicoadd');
const btnadicionarservico = document.getElementById("btnadicionarservico");

function adicionarTabela(modaladd, btnAdicionar, IdAdd, tipoAdd, formTipo, controle, foto, fotoinput) {

    modaladd.addEventListener('shown.bs.modal', () => {
        IdAdd.focus();
        const submitHandler = function (event) {
            event.preventDefault();
            btnAdicionar.disabled = true;
            var form = event.target;
            var formData = new FormData(form);
            formData.append('controle', tipoAdd);
            if (foto) {

                var fileinput = document.getElementById(fotoinput);
                console.log(fileinput.files[0]);
                formData.append('foto', fileinput.files[0]);
            }

            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        alert(data.message);
                        carregarConteudo(controle);
                    } else {
                        alert(data.message);
                    }

                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        };
        formTipo.addEventListener('submit', submitHandler)
    })
};

function modaladd(nomemodal1, nome_formulario1, btnAdicionar1, idAdd1, controle1, controle2, foto1, fotoinput1) {
    if (nomemodal1) {
        const form1 = document.getElementById(nome_formulario1);
        adicionarTabela(nomemodal1, btnAdicionar1, idAdd1, controle1, form1, controle2, foto1, fotoinput1);
    }
}

modaladd(modaladdservico, "formulario_adicionar_servico", btnadicionarservico, idservicoadd, "servicoadd", 'listarservico', false, "");
modaladd(modaladdcliente, "formulario_adicionar_cliente", btnadicionarcliente, idclienteadd, "clienteadd", 'listarcliente', false, "");
modaladd(modalcomprarservico, "formulario_comprar_servico", btncomprarservico, idservicocomprar, "servicocomprar", 'listarcontrato', false, "");


function deletarAlgo(controle, id, controle2) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&id=' + encodeURIComponent(id),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.success = "true") {
                alert(data.message);
                carregarConteudo(controle2);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
};


function abrirFecharModal(nomeModal, abrirOuFechar) {
    var modal = new bootstrap.Modal(document.getElementById(nomeModal));

    if (abrirOuFechar === 'A') {
        modal.show();
    } else {
        modal.hide();
    }
}

function abrirModalEdicaoCarro(idcarro, modelo, grupo) {

    var carromodelo = document.getElementById('idmodeloedit');
    var carrogrupo = document.getElementById('idgrupoedit');
    if (carromodelo) {
        carromodelo.focus();
    }
    carromodelo.value = modelo;
    carrogrupo.value = grupo;
    document.getElementById('idcarroedit').value = idcarro;

    abrirFecharModal('modaleditcarro', 'A');
}

function abrirModalContrato() {




    abrirFecharModal('modalinfoservico', 'A');

}
function editarFormulario(formularioEditar, elementoEdit, listarElemento, foto, fotoinput) {
    document.getElementById(formularioEditar).addEventListener('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(this);
        formData.append('controle', elementoEdit);
        if (foto) {

            var fileinput = document.getElementById(fotoinput);
            console.log(fileinput.files[0]);
            formData.append('foto', fileinput.files[0]);
        }
        fetch('controle.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.success) {
                    alert(data.message);
                    carregarConteudo(listarElemento);
                } else {
                    alert(data.message);
                }

            })
            .catch(error => {
                console.error('Erro na requisição:', error);
            });
    })
}

editarFormulario('formulario_editar_carro', 'editcarro', 'listarcarro', true, "idfotoedit");



document.getElementById("formulario_comprar_carro").addEventListener('submit', function (event) {
    event.preventDefault();

    var formData = new FormData(this);
    formData.append('controle', 'comprarcarro');

    fetch('controle.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.success) {
                alert(data.message);
                carregarConteudo('listarcarro');
            } else {
                alert(data.message);
            }

        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
})

function barraDePesquisaCliente() {

    var input, filter, tbody, tr, nome, i;
    input = document.getElementById("idclientepesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");


    for (i = 0; i < tr.length; i++) {

        nome = tr[i].getElementsByTagName("span")[1];

        cpf = tr[i].getElementsByTagName("span")[2];

        if (nome.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (cpf.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}
function barraDePesquisaServico() {

    var input, filter, tbody, tr, nome, i;
    input = document.getElementById("idservicopesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");


    for (i = 0; i < tr.length; i++) {

        nome = tr[i].getElementsByTagName("span")[1];

        cpf = tr[i].getElementsByTagName("span")[2];

        if (nome.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (cpf.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}

