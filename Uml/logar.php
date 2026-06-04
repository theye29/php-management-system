<?php
// session_start();
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)) {
    $cpf = $dados['cpf'];
    $pass = $dados['senha'];
    
    $validar = ValidarSenhaCriptografada('idcliente, cliente, senha, cpf, funcionario', 'cliente', 'senha', 'cpf', $pass, $cpf);
    if ($validar != null) {

        if ($validar == 'cpf') {
            echo json_encode(['success' => false, 'message' => "cpf ou Senha errada"]);
        } else if ($validar == 'senha') {
            echo json_encode(['success' => false, 'message' => "cpf ou Senha errada"]);
        } else {

            $_SESSION['idcliente'] = $validar->idcliente;
            $_SESSION['cpf'] = $validar->cpf;
            $_SESSION['funcionario'] = $validar->funcionario;
            echo json_encode(['success' => true, 'message' => "Logado com sucesso"]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuário ou senha errado']);
    }
}