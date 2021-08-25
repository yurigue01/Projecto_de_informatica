<?php
session_start();
require("config.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["Tipo_utilizador_ID_tipo"]!=1){
        header("location: perfil_adm.php");
    }
}



if(!empty($_POST['Titulo'])||!empty($_POST['Vagas'])||!empty($_POST['Estado'])||!empty($_POST['Descricao'])||!empty($_POST['Categoria_Salarial'])||!empty($_POST['Regime'])||!empty($_POST['Data_Criacao']) ||!empty($_POST['Area_idArea'])||!empty($_POST['Empresa_ID_empresa'])||!empty($_POST['Tipo_da_Oferta_ID_tipo'])||!empty($_POST['Local_ID_local'])) {
    $Titulo = $_POST['Titulo'];
    $Vagas= $_POST['Vagas'];
    $Estado = $_POST['Estado'];
    $Descricao = $_POST['Descricao'];
    $Categoria_Salarial = $_POST['Categoria_Salarial'];
    $Regime = $_POST['Regime'];
    $Data_Criacao = $_POST['Data_Criacao'];
    $Area_idArea = $_POST['Area_idArea'];
    $Empresa_ID_empresa = $_POST['Empresa_ID_empresa'];
    $Tipo_da_Oferta_ID_tipo= $_POST['Tipo_da_Oferta_ID_tipo'];
    $Local_ID_local = $_POST['Local_ID_local'];


    $sql = "INSERT INTO oferta(Titulo, Vagas, Estado, Descricao, Categoria_Salarial, Regime, Data_Criacao, Area_idArea, Empresa_ID_empresa, Tipo_da_Oferta_ID_tipo, Local_ID_local ) VALUES ('$Titulo','$Vagas','$Estado','$Descricao','$Categoria_Salarial','$Regime','$Data_Criacao','$Area_idArea','$Empresa_ID_empresa','$Tipo_da_Oferta_ID_tipo','$Local_ID_local')";
    if (!mysqli_query($link, $sql)) {
        print_r(mysqli_error($link));

        $result = mysqli_query($link, "SELECT * FROM oferta INNER JOIN area ON  oferta.Area_idArea= area.idArea INNER JOIN empresa ON oferta.Empresa_ID_empresa= empresa.ID_empresa  INNER JOIN tipo_da_oferta ON oferta.Tipo_da_Oferta_ID_tipo= tipo_da_oferta.ID_tipo INNER JOIN local ON oferta.Local_ID_local= local.ID_local ");



    }

    header("Location:gerir_oferta_adm.php");

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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-signin">
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
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Inserir Oferta</h4>
                </div>

            </div>
            <form action="add_oferta.php" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="Titulo" class="form-control >
                                </div>
                                <div class="form-group">
                                        <label>Vagas</label>
                                        <input type="text" name="Vagas" class="form-control ">
                                    </div>

                                    <div class="form-group">
                                         <select class="custom-select d-block w-100" name="Empresa_ID_empresa" required>
                                        <option value="">Empresa...</option>
                                        <?php
                                        require ("config.php");
                                        $link->set_charset("utf8");
                                        $consulta = 'SELECT * FROM empresa';

                                        /* executar a sql e testar se ocorreu erro */
                                        if (!$resultado = $link->query($consulta)) {
                                            echo ' Falha na sql: '. $link->error;
                                            $link->close();  /* fechar a ligação */
                                        }
                                        else{
                                            while ($row = $resultado->fetch_assoc()) {

                                                ?>
                                                <option value=<?php echo $row['ID_empresa'];?>><?php echo $row['Nome'];?></option>
                                                <?php
                                            }

                                        }
                                        ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label>Descrição</label>
                                        <input type="text" name="Descricao" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label>Categoria Salarial</label>
                                        <input type="text" name="Categoria_Salarial" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label>Regime</label>
                                        <input type="text" name="Regime" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Tipo_da_Oferta_ID_tipo" required>
                                            <option value="">Tipo da oferta...</option>
                                            <?php
                                            require ("config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM tipo_da_oferta';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['ID_tipo'];?>><?php echo $row['Tipo'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Local_ID_local" required>
                                            <option value="">Local de Trabalho...</option>
                                            <?php
                                            require ("config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM local';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['ID_local'];?>><?php echo $row['Local'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" name="Estado" class="form-control  ">
                                    </div>

                                    <div class="form-group">
                                        <label>Data de Criação</label>
                                        <input id="date" name="Data_Criacao" type="date" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <select class="custom-select d-block w-100" name="Area_idArea" required>
                                            <option value="">Área...</option>
                                            <?php
                                            require ("config.php");
                                            $link->set_charset("utf8");
                                            $consulta = 'SELECT * FROM area';

                                            /* executar a sql e testar se ocorreu erro */
                                            if (!$resultado = $link->query($consulta)) {
                                                echo ' Falha na sql: '. $link->error;
                                                $link->close();  /* fechar a ligação */
                                            }
                                            else{
                                                while ($row = $resultado->fetch_assoc()) {

                                                    ?>
                                                    <option value=<?php echo $row['idArea'];?>><?php echo $row['Area'];?></option>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <button style="background-color: #229bc6; color: #fff;" class="btn account-btn" type="submit">Submeter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>






            <div class="sidebar-overlay" data-reff=""></div>
            <script src="assets/js/jquery-3.2.1.min.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/jquery.slimscroll.js"></script>
            <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>