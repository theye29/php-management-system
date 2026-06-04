<?php
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {

    $cliente = $dados['addcliente'];
    $clientecpf = $dados['addcpf'];

    $retornoinsert = InsertDoisId('cliente, cpf', 'cliente', $cliente, $clientecpf);
    if ($retornoinsert != 'Vazio') {
        echo json_encode(['success' => true, 'message' => "Cliente $cliente adicionado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente $cliente não cadastrado! Erro : Bd"]);
    }
}
