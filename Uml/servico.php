<style>
    .cadservico {
        border: none;
        background-color: #2c2c2c;
        color: white;
        padding: 15px;
        margin-top: 15px;
        margin-left: 45%;
        border-radius: 15px;
    }

    .cadservico:hover {
        background-color: white;
        color: #2222bb;
    }

    #content {
        background-color: #2c2c2c;
        text-align: center;
    }

    .table2 {
        background-color: #8888ab;
        border-radius: 15px;
        font-size: 15px;
        text-align: center;
    }

    .tr {
        font-size: 50px;
        text-align: center;
    }

    .colun {
        background-color: #2222bb;
        text-align: center;
        font-size: 25px;
        padding: 10px;
    }

    /* Botões */

    .btn-comprar {
        border: none;
        border-radius: 6px;
        color: white;
        background-color: #1764bb;
        padding: 5px;
        margin: 5px;
        font-size: 17px;
        font-family: 'Courier New', Courier, monospace;
    }

    .btn-alterar {
        border: none;
        border-radius: 6px;
        color: white;
        background-color: #e35f21;
        padding: 5px;
        margin: 5px;
        font-size: 17px;
        font-family: 'Courier New', Courier, monospace;
    }

    .btn-deletar {
        border: none;
        border-radius: 6px;
        color: white;
        background-color: #2c2c2c;
        padding: 5px;
        margin: 5px;
        font-size: 17px;
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<div class="mt-5 container">

    <button type="button" class="cadservico" data-bs-toggle="modal" data-bs-target="#modaladdservico">
        Cadastrar
    </button>
    <div class="mb-3">
        <label for="idservicopesquisar" class="form-label">Pesquisar</label>
        <input type="text" class="form-control" id="idservicopesquisado" onkeyup="barraDePesquisaServico()" placeholder="Pesquise o seu servico por serviço/prestador">
    </div>

    <div class="row p-3 table-responsive">
        <table class="table2">
            <thead>
                <tr class="tr">
                    <th scope="col" class="colun">ID</th>
                    <th scope="col" class="colun">Serviço</th>
                    <th scope="col" class="colun">Prestador</th>
                    <th scope="col" class="colun">Ativo</th>
                    <th scope="col" class="colun">Controle</th>
                </tr>
            </thead>
            <tbody id="meumenu">
                <?php
                $servico = listarTabela("idservico, servico, prestador, ativo", 'servico', 'idservico');

                if ($servico != 'Vazio') {
                    foreach ($servico as $itemservico) {
                        $idservico = $itemservico->idservico;
                        $servico = $itemservico->servico;
                        $prestador = $itemservico->prestador;
                        $ativo = $itemservico->ativo;
                ?>
                        <tr>
                            <th scope="row">
                                <span><?php echo "$idservico"; ?></span>

                            </th>
                            <td>
                                <span><?php echo "$servico"; ?></span>

                            </td>
                            <td>
                                <span><?php echo "$prestador"; ?></span>

                            </td>
                            <td>
                                <span><?php echo "$ativo"; ?></span>

                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    
                                    <button type="button" class="btn-alterar" onclick="abrirModalserviço(<?php echo $idcarro; ?>, '<?php echo $modelocarro; ?>', '<?php echo $grupocarro; ?>')">Alterar</button>
                                    <button type="button" class="btn-deletar" onclick="deletarAlgo('carrodel', <?php echo $idcarro; ?>, 'listarcarro')">Deletar</button>
                                </div>
                            </td>
                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>