<?php
require_once ("config.php");
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["Tipo_utilizador_ID_tipo"]!=2){
        header("location: perfil_candidato.php");
    }
}





if(!empty($_POST['imagem'])) {


    /*imagens*/
    print_r($_FILES);
    $imagens = $_FILES['imagem'];

    $imagensName = $_FILES['imagem']['name'];
    $imagensTmpName = $_FILES['imagem']['tmp_name'];
    $imagensSize = $_FILES['imagem']['size'];
    $imagensError = $_FILES['imagem']['error'];
    $imagensType = $_FILES['imagem']['type'];

    $imagensExt = explode('.', $imagensName);
    $imagensActualExt = strtolower(end($imagensExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    /*
    print_r($_FILES);
    $video = $_FILES['video'];
    $videoName = $_FILES['video']['name'];
    $videoTmpName = $_FILES['video']['tmp_name'];
    $videoSize = $_FILES['video']['size'];
    $videoError = $_FILES['video']['error'];
    $videoType = $_FILES['video']['type'];

    $videoExt = explode('.', $videoName);
    $videoActualExt = strtolower(end($videoExt));

    $allowed = array('mp4');
video*/
    $id=$_SESSION["ID_utilizador"];
    $sql = "INSERT INTO utilizador( imagens) VALUES ('".$imagens['name']."') where ID_utilizador IN (".$id.")";
    if (!mysqli_query($link, $sql)) {
        print_r(mysqli_error($link));


        if (in_array($imagensActualExt, $allowed)) {
            if ($imagensError === 0) {
                if ($imagensSize < 1000000) {
                    $imagensNameNew = uniqid('', true) . "." . $imagensActualExt;
                    $imagensDestination = 'imagem/' . $imagensNameNew;
                    move_uploaded_file($imagensTmpName, $imagensDestination);
                    //header("Location:cadastro_produtos.php");
                } else {
                    echo "Sua imagens e muito grande";
                }
            } else {
                echo " Houve um erro ao fazer o upload";
            }
        } else {
            echo "Não podes fazer upload deste tipo de imagens";
        }
        /*video
        if (in_array($videoActualExt, $allowed)) {
            if ($videoError === 0) {
                if ($videoSize < 1000000) {
                    $videoNameNew = uniqid('', true) . "." . $videoActualExt;
                    $videoDestination = 'video/' . $videoNameNew;
                    move_uploaded_file($videoTmpName, $videoDestination);
                    //header("Location:cadastro_produtos.php");
                } else {
                    echo "Seu video e muito grande";
                }
            } else {
                echo " Houve um erro ao fazer o upload";
            }
        } else {
            echo "Não podes fazer upload deste tipo de video";
        }
*/


    }

    header("Location:perfil_candidato.php");

}



?>


<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
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
                <img src="assets/img/ipb.png" width="120" height="60" alt=""> <span>AJUDA.IPB</span>
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
                    <a class="dropdown-item" href="perfil_candidato.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_candidato.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="perfil_candidato.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>

                    <li>
                        <a href="oferta_de_emprego_cand.php"> <span>Ofertas Emprego/Estagio </span></a>
                    </li>
                    <li>
                        <a href="as_m_candi_cand.php"> <span>Candidaturas</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>





    <form action="teste.php" method="post" enctype="multipart/form-data">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Foto</h4>
                    </div>
                    <input type="submit"  value="Carregar">
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">



                                    </div>

                                </div>
                                <div class="profile-basic">

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h5 class="user-name m-t-0 mb-10">Imagem </h5>

                                            </div>
                                            <input type="file" name="imagem" value="imagem">
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>