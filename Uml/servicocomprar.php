<?php
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    
    $servico = $dados['comprarservico'];
    $servicocpf = $dados['comprarcliente'];
    $servicopagamento = $dados['comprarpagamento'];
    $servicodata = $dados['comprardata'];
    $servicovalor = $dados['comprarvalor'];
    $servicovalorentrada = $dados['comprarvalorentrada'];
   
    $clientetabela = listarPorAlgo("cpf, cliente", 'cliente', 'cpf', $servicocpf);
    
    if ($clientetabela != 'Vazio'){
        foreach ($clientetabela as $itemcliente){
            $servicoprestador = $itemcliente->cliente;
        }
        
        $retornoinsert = InsertOitoId('servico, cliente, datainicial, datafinal, valorentrada, valortotal, pagamento, prestador', 'contrato', $servico, $servicocpf, DATATIMEATUAL, $servicodata, $servicovalorentrada, $servicovalor, $servicopagamento, $servicoprestador);
        if ($retornoinsert != 'Vazio') {
            echo json_encode(['success' => true, 'message' => "servico $servico adicionado com sucesso"]);
        } else {
            echo json_encode(['success' => false, 'message' => "servico $servico não cadastrado! Erro : Bd"]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => "servico $servico não cadastrado! Erro : Cliente Não cadastrado"]);
    }
    
}
