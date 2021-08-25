<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["ID_utilizador"];
    $Mensagem = filter_input(INPUT_POST, 'm_Mensagem');
    $Oferta_ID_oferta1 = filter_input(INPUT_POST, 'm_Oferta_ID_oferta1');


    /* validar os dados recebidos do formulario */
    if (empty($Mensagem)) {

        echo "Todos os campos do formulário devem conter valores ";

    } else {
        require("config.php");
        $link->set_charset("utf8");
        /* texto sql da sql*/
        $ar = "INSERT INTO candidatura (Utilizador_ID_utilizador,  Oferta_ID_oferta1,  Mensagem) VALUES ('$id', '$Oferta_ID_oferta1', '$Mensagem')";
        $result = mysqli_query($link, "SELECT * FROM candidatura INNER JOIN oferta ON  candidatura.Oferta_ID_oferta1= oferta.ID_oferta INNER JOIN utilizador ON candidatura.Utilizador_ID_utilizador= utilizador.ID_utilizador  ");

        /* executar a sql e testar se ocorreu erro */
        if (!$link->query($ar)) {
            echo "  Falha ao executar a sql: \"$ar\" <br>" . $link->error;
            $link->close();  /* fechar a ligação */
        } else {

            header("location: as_m_candi_cand.php");
        }


    }
}


/* estabelece a ligação à base de dados */
?>

