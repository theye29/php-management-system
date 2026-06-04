<?php
// session_start();
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
$acaoid = filter_input(INPUT_POST, 'acaoid', FILTER_SANITIZE_NUMBER_INT);
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
$controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);

switch ($acao) {
}

switch ($controle) {
    default:
?>
        <h1 class="text-center" style="margin-top: 20%; font-size:700%">ERROR 404</h1>
<?php
        break;


    case "listarcliente":
        include_once 'cliente.php';
        break;
    case "clienteadd":
        include_once 'clienteadd.php';
        break;
    case "listarfuncionario":
        include_once 'funcionario.php';
        break;
    case "listarservico":
        include_once 'servico.php';
        break;
    case "servicoadd":
        include_once 'servicoadd.php';
        break;
    case "servicodel":
        include_once 'servicodel.php';
        break;
    case "listarcontrato":
        include_once 'contrato.php';
        break;
    case "servicocomprar":
        include_once 'servicocomprar.php';
        break;
}







?>