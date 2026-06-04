<?php

include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';

if (!isset($_SESSION['idcliente']) or empty($_SESSION['idcliente'])) {

    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand " href="principal.php" style="color: white; font-size: 250%;">Programa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-center" aria-current="page" href="logout.php" style="color: white; font-size: 150%;">Log-out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="row vh-100" style="height: 100%">
        <div class="col-md-2 text-center">
            <br><br>
            <?php 
            if ($_SESSION['funcionario'] == "V"){

            
            ?>
            <button type="button" class="list-group-item list-group-item-action" onclick="carregarConteudo('listarcliente')" id="btnlist">Clientes</button>
            <button type="button" class="list-group-item list-group-item-action" onclick="carregarConteudo('listarfuncionario')" id="btnlist">Membros</button>
            <?php
            }
            ?>
            
            <button type="button" class="list-group-item list-group-item-action" onclick="carregarConteudo('listarcontrato')" id="btnlist">Contratos</button>

        </div>
        <div class="col-md-10" id="others">

            <div class="container-fluid text-white" id='conteudo'>
                <?php
                include_once "area.php";

                ?>
            </div>

        </div>
    </div>


    <!-- Modal Adicionar Cliente -->

    <div class="modal fade" id="modaladdcliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <form name='formulario_adicionar_cliente' enctype="multipart/form-data" id='formulario_adicionar_cliente' method="post" action="#">
                        <div class="mb-3">

                            <label for="idclienteadd" class="form-label">Cliente</label>
                            <input type="text" class="form-control form-control-sm" required="required" id="idclienteadd" name="addcliente" placeholder="Nome do cliente" aria-label=".form-control-sm addcliente">

                            <label for="idcpfadd" class="form-label">Cpf</label>
                            <input type="number" class="form-control form-control-sm" required="required" id="idcpfadd" name="addcpf" placeholder="Cpf (numeros apenas)" aria-label=".form-control-sm addcpf">
                        </div>
                        <center>
                            <button type="submit" class="btnadicionarcliente" id='btnadicionarcliente'>Adicionar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Adicionar Serviço -->

    <div class="modal fade" id="modaladdservico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <form name='formulario_adicionar_servico' enctype="multipart/form-data" id='formulario_adicionar_servico' method="post">
                        <div class="mb-3">

                            <label for="idservicoadd" class="form-label">Serviço</label>
                            <input type="text" class="form-control form-control-sm" required="required" id="idservicoadd" name="addservico" placeholder="Serviço prestado" aria-label=".form-control-sm addservico">

                            <label for="idprestadoradd" class="form-label">Prestador</label>
                            <input type="text" class="form-control form-control-sm" required="required" id="idprestadoradd" name="addprestador" placeholder="Prestador do serviço" aria-label=".form-control-sm addprestador">
                        </div>
                        <center>
                            <button type="submit" class="btnadicionarservico" id='btnadicionarservico'>Adicionar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Comprar servico -->

    <div class="modal fade" id="modalcomprarservico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <form name='formulario_comprar_servico' enctype="multipart/form-data" id='formulario_comprar_servico' method="post" action="#">

                        <input type="hidden" id="idclientecomprar" name="comprarcliente" value="<?php echo $_SESSION['cpf']?>">

                        <label for="idservicocomprar" class="form-label">Serviço :</label>
                        <input type="text" class="form-control form-control-sm" id="idservicocomprar" name="comprarservico" placeholder="Serviço" aria-label=".form-control-sm comprarservico">


                        <label for="iddatacomprar" class="form-label">Prazo de entrega :</label>
                        <input type="date" class="form-control form-control-sm" id="iddatacomprar" name="comprardata" min="<?php echo $dataatual; ?>" placeholder="Prazo" aria-label=".form-control-sm comprardata">


                        <label for="idvalorcomprar" class="form-label">Valor Total :</label>
                        <input type="number" class="form-control form-control-sm" id="idvalorcomprar" name="comprarvalor" placeholder="Valor total" aria-label=".form-control-sm comprarvalor">

                        <label for="idvalorentradacomprar" class="form-label">Valor Entrada :</label>
                        <input type="number" class="form-control form-control-sm" id="idvalorentradacomprar" name="comprarvalorentrada" placeholder="Valor de Entrada" aria-label=".form-control-sm comprarvalorentrada">

                        <label for="idpagamentocomprar" class="form-label">Pagamento :</label>
                        <select class="form-control form-control-sm" name="comprarpagamento" id="idpagamentocomprar">


                            <option value="vista">A Vista</option>
                            <option value="prazo">Prazo</option>
                        </select>

                        <center>
                            <button type="submit" class="btncomprarservico mt-3" id='btncomprarservico'>Confirmar compra</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/func.js">

    </script>
</body>

</html>