<?php
function listarTabela($campos, $tabela, $campoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem ");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function ValidarSenha($campos, $tabela, $campoBdstring, $campoBdstring2, $campoParametro, $campoParametro2, $campobdativo, $valorativo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos"
            .  " FROM $tabela"
            .  " WHERE $campoBdstring = ? AND $campoBdstring2 = ? AND $campobdativo = ?");
        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $campoParametro2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valorativo, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (Throwable $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function ValidarSenhaCriptografada($campos, $tabela, $campoBdstring, $campoBdstring2, $campoParametro, $campoParametro2)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos"
            .  " FROM $tabela"
            .  " WHERE $campoBdstring2 = ?");
        $sqlLista->bindValue(1, $campoParametro2, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            $retornosql = $sqlLista->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornosql->$campoBdstring;
            if (password_verify($campoParametro, $senha_hash)) {
                return $retornosql;
            }
            return 'senha';
        } else {
            return 'cpf';
        }
        return null;
    } catch (Throwable $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function InsertDoisId($Campos, $tabela, $CampoValor1, $CampoValor2)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela ($Campos) VALUES (?, ?)");
        $sqlLista->bindValue(1, $CampoValor1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $CampoValor2, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        $IdInsertRetorno = $conn->lastInsertId();
        if ($sqlLista->rowCount() > 0) {
            return $IdInsertRetorno;
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function InsertTresId($Campos, $tabela, $CampoValor1, $CampoValor2, $CampoValor3)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela ($Campos) VALUES (?, ?, ?)");
        $sqlLista->bindValue(1, $CampoValor1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $CampoValor2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $CampoValor3, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        $IdInsertRetorno = $conn->lastInsertId();
        if ($sqlLista->rowCount() > 0) {
            return $IdInsertRetorno;
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function InsertQuatroId($Campos, $tabela, $CampoValor1, $CampoValor2, $CampoValor3, $CampoValor4)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela ($Campos) VALUES (?, ?, ?, ?)");
        $sqlLista->bindValue(1, $CampoValor1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $CampoValor2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $CampoValor3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $CampoValor4, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        $IdInsertRetorno = $conn->lastInsertId();
        if ($sqlLista->rowCount() > 0) {
            return $IdInsertRetorno;
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function InsertOitoId($Campos, $tabela, $CampoValor1, $CampoValor2, $CampoValor3, $CampoValor4, $CampoValor5, $CampoValor6, $CampoValor7, $CampoValor8)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela ($Campos) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sqlLista->bindValue(1, $CampoValor1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $CampoValor2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $CampoValor3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $CampoValor4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $CampoValor5, PDO::PARAM_STR);
        $sqlLista->bindValue(6, $CampoValor6, PDO::PARAM_STR);
        $sqlLista->bindValue(7, $CampoValor7, PDO::PARAM_STR);
        $sqlLista->bindValue(8, $CampoValor8, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        $IdInsertRetorno = $conn->lastInsertId();
        if ($sqlLista->rowCount() > 0) {
            return $IdInsertRetorno;
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function listarId($campos, $tabela, $campoId, $campoIdValor)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoId = ?");
        $sqlLista->bindValue(1, $campoIdValor, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function editarTabela($Campos, $tabela, $idCampo, $idCampoValor)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $Campos WHERE $idCampo = ?");
        $sqlLista->bindValue(1, $idCampoValor, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();

        if ($sqlLista->rowCount() > 0) {
            return $sqlLista -> rowCount();
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function deletarTabela($tabela, $idCampo, $idCampoValor)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("DELETE FROM $tabela WHERE $idCampo = ?");
        $sqlLista->bindValue(1, $idCampoValor, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->rowCount();
        } else {
            return 0;
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function listarPorAlgo($campos, $tabela, $campoId, $campoIdValor)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoId = ?");
        $sqlLista->bindValue(1, $campoIdValor, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}