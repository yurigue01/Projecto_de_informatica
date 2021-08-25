<?php
session_start();


function getHab($srv){
    $sql = "SELECT *  FROM habilitacoes_has_utilizador WHERE ";
    $stmt = $srv->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getOfertasByIds($pdo, $ids) {
    $sql = "SELECT oferta.*, area.*, empresa.*, tipo_da_oferta.*, local.* FROM oferta INNER JOIN area ON oferta.Area_idArea = area.idArea INNER JOIN empresa ON oferta.Empresa_ID_empresa = empresa.ID_empresa  INNER JOIN tipo_da_oferta ON oferta.Tipo_da_Oferta_ID_tipo = tipo_da_oferta.ID_tipo   INNER JOIN local ON oferta.Local_ID_local = local.ID_local  WHERE  ID_oferta IN (".$ids.")";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function EstablishDBCon()
{
$pdo = include_once 'config';
    return $pdo;
}


?>


