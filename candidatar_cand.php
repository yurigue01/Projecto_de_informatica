<?php
session_start();
require_once ("config.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["Tipo_utilizador_ID_tipo"]!=2){
        header("location: perfil_candidato.php");
    }
}

if($_GET['acao'] == 'add') {
    $idyx = intval($_GET['id']);
}


require_once "operacao.php";

$pdoConfig = require_once "config.php";
//$of=getOfertasByIds($pdoConfig,$idyx);

/*if (!empty($_POST['Nome_cand']) || !empty($_POST['Oferta_ID_oferta1']) || !empty($_POST['Utilizador_ID_utilizador']) ) {
    $nomecad = $_POST['Nome_cand'];
    $Oferta_ID_oferta1= $_POST['Oferta_ID_oferta1'];
    $Utilizador_ID_utilizador = $_POST['Utilizador_ID_utilizador'];



    $sql = "INSERT INTO candidatura (Nome_cand, Oferta_ID_oferta1, Utilizador_ID_utilizador  ) VALUES ('$nomecad', '$Oferta_ID_oferta1','$Utilizador_ID_utilizador')";

    if (!mysqli_query($link, $sql)) {
        print_r(mysqli_error($link));

        $result = mysqli_query($link, "SELECT * FROM candidatura INNER JOIN oferta ON  candidatura.Oferta_ID_oferta1= oferta.ID_oferta INNER JOIN utilizador ON candidatura.Utilizador_ID_utilizador= utilizador.ID_utilizador  ");


    }

    header("Location:as_m_candi_cand.php");

}


*/


?>

<!DOCTYPE html>
<html lang="pt">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ipb.png">
    <title>AJUDA.IPB</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>


<body>
<div class="main-wrapper">
    <div class="header">
        <div class="header-left">

                <a href="index.php" class="logo">
                    <img src="assets/img/ipb.png" width="35" height="35" alt=""> <span>AJUDA.IPB</span>
                </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                    <span>Perfil</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.html">Meu Perfil</a>
                    <a class="dropdown-item" href="Ca.html">Editar Perfil</a>
                    <a class="dropdown-item" href="change-password.html">Alterar Password</a>
                    <a class="dropdown-item" href="Login/login.html">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">Meu Perfil</a>
                <a class="dropdown-item" href="Ca.html">Editar Perfil</a>
                <a class="dropdown-item" href="change-password.html">Alterar Password</a>
                <a class="dropdown-item" href="../../Login/login.html">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="profile.html"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="../../assets/Instruction%20Manual%20for%20Safety%20and%20Comfort.pdf"><i class="fa fa-book"></i> <span>CV</span></a>
                    </li>
                    <li>
                        <a href="Orfertas_emprego.html"> <span>Ofertas Emprego/Estagio </span></a>
                    </li>
                    <li>
                        <a href="CandidaturaAluno.html"> <span>Candidaturas</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">






















        <?php // foreach($of as $ofe) :





        /* definir o charset utilizado na ligação */
        $link->set_charset("utf8");

        /* texto sql da sql*/   //paramos aqui
        $catc  = "SELECT oferta.*, area.*, empresa.*, tipo_da_oferta.*, local.* FROM oferta INNER JOIN area ON oferta.Area_idArea = area.idArea INNER JOIN empresa ON oferta.Empresa_ID_empresa = empresa.ID_empresa  INNER JOIN tipo_da_oferta ON oferta.Tipo_da_Oferta_ID_tipo = tipo_da_oferta.ID_tipo   INNER JOIN local ON oferta.Local_ID_local = local.ID_local  WHERE  ID_oferta IN (".$idyx.")";


        /* executar a sql e testar se ocorreu erro */
        if($resultado=$link->query($catc)){
            while ($row=$resultado->fetch_assoc()){
                echo
                    '<div class="content">
           





            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-20">
                        <div class="profile-view">

                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">


                                            <div>
                                                <h4>Oferta de Emprego</h4>
                                            </div>
                                            <span class="title">Empresa: </span>
                                            <span class="title"> '.$row['Nome'].'</span>
                                            <div class="staff-id">Título :</div>
                                             <span class="title"> '.$row['Titulo'].'</span>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <p>Descrição:</p>
                                                <p>'.$row['Descricao'].' .</p>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Candidatura</a></li>
                </ul>
                   <form action="ad_candidatura_cad.php" method="post" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <p class="card-title">Informações Académicas</p>
                                    <p>Escreva uma mensagem sucinta, dirigida ao empregador. Lembre-se que as primeiras impressões são muito importantes quando se seleccionam os candidatos.</p>
                                    <div class="experience-box">
                                        <textarea type="text" style="width: 55%;" name="m_Mensagem" cols="10" rows="3"></textarea>
                                    </div>
                                    </div>
                                      <button type="submit" class="button is-block is-link is-large ">Registar Receita</button>
                                        </form>
                                  
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>';



            }
            $resultado->free();
            $link->close();
        }


        ?>




    </div>

</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js">
    var ps = new PerfectScrollbar('#sidebar');

</script>
<script src="assets/js/bootstrap.min.js">
    /*
    function validar() {
        var enviar = false;

        var candidatura = document.getElementById("Nome").value;
        if (candidatura=="") {
            document.getElementById("Nome").setCustomValidity("Preencha a Categoria de Produto!");

        }
        else {
            enviar = true;
        }

        return enviar;
    }
*/

</script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>
