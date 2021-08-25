<?php
require("config.php");
session_start();


/* Ver se o formulário foi submetido */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_oferta = filter_input(INPUT_POST, 'e_ID_oferta');
    $Titulo = filter_input(INPUT_POST, 'e_Titulo');
    $Vagas = filter_input(INPUT_POST, 'e_Vagas');
    $Estado= filter_input(INPUT_POST, 'e_Estado');
    $Descricao= filter_input(INPUT_POST, 'e_Descricao');
    $Regime = filter_input(INPUT_POST, 'e_Regime');
    $Categoria_Salarial = filter_input(INPUT_POST, 'e_Categoria_Salarial');
    $Data_Criacao = filter_input(INPUT_POST, 'e_Data_Criacao');
    $Area_idArea = filter_input(INPUT_POST, 'e_Area_idArea');
    $Empresa_ID_empresa = filter_input(INPUT_POST, 'e_Empresa_ID_empresa');
    $Tipo_da_Oferta_ID_tipo = filter_input(INPUT_POST, 'e_Tipo_da_Oferta_ID_tipo');
    $Local_ID_local = filter_input(INPUT_POST, 'e_Local_ID_local');




    /* validar os dados recebidos do formulario */
    if (empty($Titulo)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }
}
else{
    echo " ERRO - Não foi possível executar a operação editar. ";
    exit();
}


/* texto sql da sql*/
$sql = "UPDATE oferta SET  Titulo='$Titulo', Vagas='$Vagas', Estado='$Estado', Descricao='$Descricao', Regime='$Regime', Categoria_Salarial=' $Categoria_Salarial', Data_Criacao='$Data_Criacao', Area_idArea='$Area_idArea', Empresa_ID_empresa='$Empresa_ID_empresa' , Tipo_da_Oferta_ID_tipo='$Tipo_da_Oferta_ID_tipo' , Local_ID_local ='$Local_ID_local '  WHERE ID_oferta='$ID_oferta '";

/* executar a sql e testar se ocorreu erro */
if (!$link->query($sql)) {
    echo " ERRO - Falha ao executar a sql: \"$sql\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */
}
else {
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    header("location: oferta_e.php");

    $link->close(); /* fechar a ligação */
}
?>



