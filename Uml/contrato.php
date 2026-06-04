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
        border-radius: 15px;
        color: white;
        background-color: green;
        padding: 5px;
        margin: 5px;
        font-size: 17px;
        font-family: 'Courier New', Courier, monospace;
    }

    .btn-alterar {
        border: none;
        border-radius: 15px;
        color: white;
        background-color: #e35f21;
        padding: 5px;
        margin: 5px;
        font-size: 17px;
        font-family: 'Courier New', Courier, monospace;
    }

    .btn-deletar {
        border: none;
        border-radius: 15px;
        color: white;
        background-color: #2c2c2c;
        padding: 5px;
        margin: 5px;
        font-size: 17px;
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<div class="mt-5 container">
    <button type="button" class="cadservico" data-bs-toggle="modal" data-bs-target="#modalcomprarservico">
        Comprar Serviço
    </button>
    <div class="row p-3 table-responsive">
        <table class="table2 ">
            <thead>
                <tr class="tr">
                    <th scope="col" class="colun">ID</th>
                    <th scope="col" class="colun">Servico</th>
                    <th scope="col" class="colun">Prestador</th>
                    <th scope="col" class="colun">Data_F</th>
                    <th scope="col" class="colun">Valor</th>
                    <th scope="col" class="colun">Ação</th>
                </tr>
            </thead>
            <tbody id="meumenu">
                <?php
                $contrato = listarTabela("idcontrato, servico, cliente, datainicial, datafinal, valorentrada, valortotal, pagamento, prestador", 'contrato', 'idcontrato');

                if ($contrato != 'Vazio') {
                    foreach ($contrato as $itemcontrato) {
                        $idcontrato = $itemcontrato->idcontrato;
                        $servico = $itemcontrato->servico;
                        $cliente = $itemcontrato->cliente;
                        $datainicial = $itemcontrato->datainicial;
                        $datafinal = $itemcontrato->datafinal;
                        $valorentrada = $itemcontrato->valorentrada;
                        $valortotal = $itemcontrato->valortotal;
                        $pagamento = $itemcontrato->pagamento;
                        $prestador = $itemcontrato->prestador;

                        if ($_SESSION['funcionario'] == "V") {
                ?>
                            <tr>
                                <th scope="row">
                                    <span><?php echo "$idcontrato"; ?></span>

                                </th>
                                <td>
                                    <span><?php echo "$servico"; ?></span>

                                </td>
                                <td>
                                    <span><?php echo "$prestador"; ?></span>

                                </td>
                                <td>
                                    <span><?php echo "$datafinal"; ?></span>

                                </td>
                                <td>
                                    R$<span><?php echo "$valortotal"; ?></span>

                                </td>
                                <td>
                                    <button type="button" class="btn-comprar" data-bs-toggle="modal" data-bs-target="#modalinfoservico<?php echo $idcontrato; ?>">Info</button>

                                </td>
                            </tr>
                            <?php
                        } else {
                            if ($_SESSION['cpf'] == $cliente) {


                            ?>

                                <tr>
                                    <th scope="row">
                                        <span><?php echo "$idcontrato"; ?></span>

                                    </th>
                                    <td>
                                        <span><?php echo "$servico"; ?></span>

                                    </td>
                                    <td>
                                        <span><?php echo "$cliente"; ?></span>

                                    </td>
                                    <td>
                                        <span><?php echo "$prestador"; ?></span>

                                    </td>
                                    <td>
                                        <span><?php echo "$datafinal"; ?></span>

                                    </td>
                                    <td>
                                        R$<span><?php echo "$valortotal"; ?></span>

                                    </td>
                                    <td>
                                        <button type="button" class="btn-comprar" data-bs-toggle="modal" data-bs-target="#modalinfoservico<?php echo $idcontrato; ?>">Info</button>

                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>


                        <div class="modal fade" id="modalinfoservico<?php echo $idcontrato; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <?php
                                        $contratos = listarId("servico, cliente, datainicial, datafinal, valorentrada, valortotal, pagamento, prestador", "contrato", "idcontrato", $idcontrato);


                                        foreach ($contratos as $itemcontrato) {

                                            $contratoservico = $itemcontrato->servico;
                                            $contratocliente = $itemcontrato->cliente;
                                            $contratodatainicial = $itemcontrato->datainicial;
                                            $contratodatafinal = $itemcontrato->datafinal;
                                            $contratovalorentrada = $itemcontrato->valorentrada;
                                            $contratovalortotal = $itemcontrato->valortotal;
                                            $contratopagamento = $itemcontrato->pagamento;
                                            $contratoprestador = $itemcontrato->prestador;

                                        ?>

                                            <p>Serviço: <span><?php echo $contratoservico; ?></span></p>
                                            <p>Prestador: <span><?php echo $contratoprestador; ?></span></p>
                                            <p>Cpf prestador: <span><?php echo $contratocliente; ?></span></p>
                                            <p>Data inicial: <span><?php echo $contratodatainicial; ?></span></p>
                                            <p>Data final: <span><?php echo $contratodatafinal; ?></span></p>
                                            <p>Valor de entrada: R$<span><?php echo $contratovalorentrada; ?></span></p>
                                            <p>Valor total: R$<span><?php echo $contratovalortotal; ?></span></p>
                                            <p>Tipo de pagamento: <span><?php echo $contratopagamento; ?></span></p>



                                        <?php

                                        }


                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Info Contrato -->