<?php
session_start();
require ("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idArea = filter_input(INPUT_POST, 'c_idArea');
    $Area = filter_input(INPUT_POST, 'c_Area');


    if (empty($Area)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE area SET Area='$Area' WHERE idArea = $idArea";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location:inserir_area_adm.php");

}
$link->close();

?>

