<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_empresa.php");
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
            <a href="index.html" class="logo">
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
                    <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
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
                        <a href="perfil_adm.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="gerir_utilizador.php"> <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>
                            Gerir Utilizador</span></a>
                    </li>

                    <li>
                        <a href="gerir_oferta_adm.php"> <span>Gerir Oferta</span></a>
                    </li>

                    <li>
                        <a href="inserir_area_adm.php"> <span>Gerir Area</span></a>
                    </li>


                    <li>
                        <a href="inserir_local_adm.php"> <span>Gerir Local</span></a>
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

    /* texto sql da consulta*/
    $editar = "SELECT oferta.*, empresa.*, area.*, tipo_da_oferta.*, local.* FROM oferta INNER JOIN empresa ON empresa.ID_empresa = oferta.Empresa_ID_empresa INNER JOIN area ON area.idArea = oferta.Area_idArea INNER JOIN tipo_da_oferta ON tipo_da_oferta.ID_tipo = oferta.Tipo_da_Oferta_ID_tipo  INNER JOIN local ON local.ID_local = oferta.Local_ID_local  WHERE ID_oferta = '$id' ";

    /* executar a consulta e testar se ocorreu erro */
    if (!$resultado = $link->query($editar)) {
        echo ' Falha na consulta: '. $link->error;
        $link->close();  /* fechar a ligação */
    }
    else{
    /* buscar os dados do registo */
    $row = $resultado->fetch_assoc();
    ?>



    <div class="page-wrapper">

        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Alteração da Oferta </h4>
                </div>
                <form method="post" action="edit_oferta_emp.php">

                    <button style="background-color: #229bc6; color: #fff;" class="btn account-btn" type="submit">Guardar Alteracoes</button>

                    <div class="card-box profile-header">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="profile-view">

                                    <div class="page-wrapper">
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-lg-8 offset-lg-2">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Titulo <span class="text-danger"></span></label>
                                                                    <input name="e_Titulo" class="form-control" type="text" value="<?=$row['Titulo']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Vagas<span class="text-danger"></span></label>
                                                                    <input name="e_Vagas" class="form-control" type="text" value="<?=$row['Vagas']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <select class="custom-select d-block w-100"  name="e_Tipo_da_Oferta_ID_tipo" >

                                                                        <option value=<?=$row['ID_tipo']?> selected><?= $row['Tipo']?></option>
                                                                        <?php
                                                                        require ("config.php");
                                                                        $link->set_charset("utf8");
                                                                        $tp=$row['ID_tipo'];
                                                                        $consulta = "SELECT * FROM tipo_da_oferta where ID_tipo!='$tp'";

                                                                        /* executar a consulta e testar se ocorreu erro */
                                                                        if (!$resultado = $link->query($consulta)) {
                                                                            echo ' Falha na consulta: '. $link->error;
                                                                            $link->close();  /* fechar a ligação */
                                                                        }
                                                                        else{
                                                                            while ($rowss = $resultado->fetch_assoc()) {

                                                                                ?>
                                                                                <option value=<?= $rowss['ID_tipo']?>><?= $rowss['Tipo']?></option>
                                                                                <?php
                                                                            }

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Descrição</label>
                                                                    <input name="e_Descricao" class="form-control " value="<?=$row['Descricao']?>" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Categoria Salarial</label>
                                                                    <input name="e_Categoria_Salarial" class="form-control " value="<?=$row['Categoria_Salarial']?>" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <label>Regime</label>
                                                                    <input name="e_Regime" class="form-control " value="<?=$row['Regime']?>" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <select class="custom-select d-block w-100"  name="e_Empresa_ID_empresa" >

                                                                        <option value=<?=$row['ID_empresa']?> selected><?= $row['Nome']?></option>
                                                                        <?php
                                                                        require ("config.php");
                                                                        $link->set_charset("utf8");
                                                                        $ep=$row['ID_empresa'];
                                                                        $consulta = "SELECT * FROM empresa where ID_empresa!='$ep'";

                                                                        /* executar a consulta e testar se ocorreu erro */
                                                                        if (!$resultado = $link->query($consulta)) {
                                                                            echo ' Falha na consulta: '. $link->error;
                                                                            $link->close();  /* fechar a ligação */
                                                                        }
                                                                        else{
                                                                            while ($rowss = $resultado->fetch_assoc()) {

                                                                                ?>
                                                                                <option value=<?= $rowss['ID_empresa']?>><?= $rowss['Nome']?></option>
                                                                                <?php
                                                                            }

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Estado</label>
                                                                    <input name="e_Estado" class="form-control " value="<?=$row['Estado']?>" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <select class="custom-select d-block w-100"  name="e_Local_ID_local" >

                                                                        <option value=<?=$row['ID_local']?> selected><?= $row['Local']?></option>
                                                                        <?php
                                                                        require ("config.php");
                                                                        $link->set_charset("utf8");
                                                                        $lc=$row['ID_local'];
                                                                        $consulta = "SELECT * FROM local where ID_local!='$lc'";

                                                                        /* executar a consulta e testar se ocorreu erro */
                                                                        if (!$resultado = $link->query($consulta)) {
                                                                            echo ' Falha na consulta: '. $link->error;
                                                                            $link->close();  /* fechar a ligação */
                                                                        }
                                                                        else{
                                                                            while ($rowss = $resultado->fetch_assoc()) {

                                                                                ?>
                                                                                <option value=<?= $rowss['ID_local']?>><?= $rowss['Local']?></option>
                                                                                <?php
                                                                            }

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <select class="custom-select d-block w-100"  name="e_Area_idArea" >

                                                                        <option value=<?=$row['idArea']?> selected><?= $row['Area']?></option>
                                                                        <?php
                                                                        require ("config.php");
                                                                        $link->set_charset("utf8");
                                                                        $ar=$row['idArea'];
                                                                        $consulta = "SELECT * FROM area where idArea!='$ar'";

                                                                        /* executar a consulta e testar se ocorreu erro */
                                                                        if (!$resultado = $link->query($consulta)) {
                                                                            echo ' Falha na consulta: '. $link->error;
                                                                            $link->close();  /* fechar a ligação */
                                                                        }
                                                                        else{
                                                                            while ($rowss = $resultado->fetch_assoc()) {

                                                                                ?>
                                                                                <option value=<?= $rowss['idArea']?>><?= $rowss['Area']?></option>
                                                                                <?php
                                                                            }

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Data de Criação</label>
                                                            <input name="e_Data_Criacao" id="date" value="<?=$row['Data_Criacao']?>" type="date" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="e_ID_oferta" class="form-control " value="<?=$row['ID_oferta']?>" type="hidden">
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

                <?php
                $resultado->free();/* libertar o resultado */

                $link->close();       /* close a ligação */
                }
                ?>
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
