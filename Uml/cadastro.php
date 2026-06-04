<?php
// session_start();
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)) {
    $usuario = $dados['usuario'];
    $cpf = $dados['cpf'];
    $pass = $dados['senha'];

    $validar = listarPorAlgo('idcliente, cliente, senha, cpf', 'cliente', 'cpf', $cpf);

    if ($validar == 'Vazio') {
        $option = [
            'cost' => 12
        ];
        $senhahash = password_hash($pass, PASSWORD_BCRYPT, $option);

        $retornoinsert = InsertTresId('cliente, senha, cpf', 'cliente', $usuario, $senhahash, $cpf);

        if ($retornoinsert != 'Vazio') {
            echo json_encode(['success' => true, 'message' => "Cadastrado com sucesso"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Não cadastrado! Erro : Bd"]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario ja existe.']);
    }
}
