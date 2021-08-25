<?php
session_start();
require("config.php");


$oferta_9 = $_GET['id'];
$apagar_2 ="DELETE FROM candidatura WHERE ID_candidatura = $oferta_9";
$resultado=$link->query($apagar_2);


if ($resultado=$link->query($apagar_2)) {
    echo "O registro da oferta foi excluido";
    header( "location: as_m_candi_cand.php");
} else {


    echo "Infelizmente não foi possivel eliminarr a oferta";
}

?>

