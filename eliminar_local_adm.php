<?php
session_start();
require("config.php");


$local = $_GET['ID_local'];
$deleta ="DELETE FROM local WHERE ID_local = $local";
$resultado=$link->query($deleta);


if ($resultado=$link->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: inserir_local_adm.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
