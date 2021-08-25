<?php
session_start();
require ("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_candidatura = filter_input(INPUT_POST, 'd_ID_candidatura');
    $nomecad = filter_input(INPUT_POST, 'd_Nome_cand');


    if (empty($nomecad)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }

}
else{
    echo "  Não foi possível editar. ";
    exit();
}


$editar ="UPDATE candidatura SET Nome_cand='$nomecad'WHERE ID_candidatura = $ID_candidatura";

if (!$link->query($editar)) {
    echo " Falha ao executar a sql: \"$editar\" <br>" . $link->error;
    $link->close();

} else {
    header( "location:as_m_candi_cand.php");

}
$link->close();

?>

