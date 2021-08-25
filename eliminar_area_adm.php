<?php
session_start();
require("config.php");


$lo = $_GET['idArea'];
$dele ="DELETE FROM area WHERE idArea = $lo";
$resulta=$link->query($dele);


if ($resulta=$link->query($dele)) {
    echo "O registro foi excluido";
    header( "location: inserir_area_adm.php");
} else {


    echo "Infelizmente não foi possivel eliminarr";
}

?>
