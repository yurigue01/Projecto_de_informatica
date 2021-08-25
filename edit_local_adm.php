<?php
session_start();
require ("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_local = filter_input(INPUT_POST, 'l_ID_local');
    $Local = filter_input(INPUT_POST, 'l_Local');


    if (empty($Local)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE local SET Local='$Local'WHERE ID_local = $ID_local";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location:inserir_local_adm.php");

}
$link->close();

?>


