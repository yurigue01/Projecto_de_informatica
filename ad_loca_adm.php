<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Local = filter_input(INPUT_POST, 'j_Local');


    /* validar os dados recebidos do formulario */
    if (empty($Local)) {

        echo "Todos os campos do formulário devem conter valores ";

    } else {
        require("config.php");
        $link->set_charset("utf8");
        /* texto sql da sql*/
        $ar = "INSERT INTO local (Local) VALUES ('$Local')";
        /* executar a sql e testar se ocorreu erro */
        if (!$link->query($ar)) {
            echo "  Falha ao executar a sql: \"$ar\" <br>" . $link->error;
            $link->close();  /* fechar a ligação */
        } else {

            header("location: inserir_local_adm.php");
        }


    }
}


/* estabelece a ligação à base de dados */
?>


