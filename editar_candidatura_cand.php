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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-signin">

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

    <?php

    /* Verificar se foi enviado o pedido para eliminar  */

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = filter_input(INPUT_GET, 'id');
        $operacao = filter_input(INPUT_GET, 'operacao');

        /* validar os dados recebidos através do pedido */
        if (empty($id) && $operacao!="editar"){

            echo " Nada para editar!! ";
        }

    }
    else{




    }


    /* estabelece a ligação à base de dados */
    require("config.php");

    /* definir o charset utilizado na ligação */
    $link->set_charset("utf8");

    /* texto sql da sql*/
    $editar = "SELECT * FROM area  WHERE idArea = '$id' ";

    /* executar a sql e testar se ocorreu erro */
    if (!$resultado = $link->query($editar)) {
        echo ' Falha na sql: '. $link->error;
        $link->close();  /* fechar a ligação */
    }
    else{
    /* buscar os dados do registo */
    $row = $resultado->fetch_assoc();
    ?>




    <div class="page-wrapper">
        <div class="content">
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
                                            <span class="title">Empresa:</span>
                                            <span class="title"></span>
                                            <div class="staff-id">Título :</div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <p>Descrição:</p>
                                                <p> .</p>
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
                <form action="edit_candidatura_cand.php" method="post" >
                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-cont">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <p class="card-title">Informações Académicas</p>
                                        <p>Escreva uma mensagem sucinta, dirigida ao empregador. Lembre-se que as primeiras impressões são muito importantes quando se seleccionam os candidatos.</p>
                                        <div class="experience-box">
                                            <textarea type="text" style="width: 55%;" name="d_Nome_cand" cols="10"  value="<?=$row['Nome_cand']?> rows="3"></textarea>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input name="d_ID_candidatura" class="form-control" type="text" value="<?=$row['ID_candidatura']?>">
                                            </div>
                                        </div>

                                        <button><a href="oferta_de_emprego_cand.php">Cancelar</a></button>
                                    </div>
                                    <div>
                                        <button type="submit"  style="background-color: #229bc6; color: #fff;"  >Guardar Alterações</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

</form>

        <?php
        $resultado->free();/* libertar o resultado */
        $link->close();       /* close a ligação */
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
</script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>
