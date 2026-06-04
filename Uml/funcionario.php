<style>
    .cadfuncionario {
        border: none;
        background-color: #2c2c2c;
        color: white;
        padding: 15px;
        margin-top: 15px;
        margin-left: 45%;
        border-radius: 15px;
    }

    .cadfuncionario:hover {
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
    
    <div class="row p-3 table-responsive">
        <table class="table2">
            <thead>
                <tr class="tr">
                    <th scope="col" class="colun">ID</th>
                    <th scope="col" class="colun">Funcionario</th>
                    <th scope="col" class="colun">Cpf</th>
                </tr>
            </thead>
            <tbody id="meumenu">
                <?php
                $funcionario = listarPorAlgo("idcliente, cliente, cpf, funcionario", 'cliente', 'funcionario', "V");

                if ($funcionario != 'Vazio') {
                    foreach ($funcionario as $itemfuncionario) {
                        $idcliente = $itemfuncionario->idcliente;
                        $cliente = $itemfuncionario->cliente;
                        $cpf = $itemfuncionario->cpf;

                ?>
                        <tr>
                            <th scope="row">
                                <span><?php echo "$idcliente"; ?></span>

                            </th>
                            <td>
                                <span><?php echo "$cliente"; ?></span>

                            </td>

                            <td>
                                <span><?php echo "$cpf"; ?></span>

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