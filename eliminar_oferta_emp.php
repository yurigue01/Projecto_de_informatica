<?php
session_start();
require("config.php");


$oferta_3 = $_GET['ID_oferta'];
$apagar_3 ="DELETE FROM oferta WHERE ID_oferta = $oferta_3";
$resultado=$link->query($apagar_3);


if ($resultado=$link->query($apagar_3)) {
    echo "O registro da oferta foi excluido";
    header( "location: oferta_e.php");
} else {


    echo "Infelizmente não foi possivel eliminarr a oferta";
}

?>

