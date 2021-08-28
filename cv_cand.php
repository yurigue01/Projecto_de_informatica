<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}



?>


<!DOCTYPE html>
<html lang="en">


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
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Curriculum Vitae</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable mb-0">

                            <tr>

                                <th>Curriculum Vitae (CV)</th>


                                <th><a href="inserir_cv.php" style="background-color: #229bc6; color: #fff;" class="btn account-btn  fa fa-plus blue2_color"  ">Adicionar</a></th>


                            </tr>


                            <?php
                            require ("config.php");

                            /* definir o charset utilizado na ligação */
                            $link->set_charset("utf8");

                            $utilizador = $_SESSION['ID_utilizador'];
                            $candida_1="SELECT * FROM utilizador  WHERE ID_utilizador = '$utilizador' ";
                            if($resultado=$link->query($candida_1)){
                                while ($row=$resultado->fetch_assoc()){
                                    echo'<tr> 
          
                 <td><a href="CV/'.$row['cv'].'"> Obter (CV)</a></td>
             
            
   
  
 
            
            </tr>';
                                }
                                $resultado->free();
                                $link->close();
                            }


                            ?>


                        </table>
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