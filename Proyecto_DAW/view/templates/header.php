<!-- Header-->
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <Style>
        .barraNavegacion {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 27%, rgba(9, 9, 121, 1) 76%, rgba(52, 80, 85, 1) 100%);
            height: 65px;
        }

        .nav-logo {
            margin-right: 20px;
        }

        .nav-logo span {
            font-size: 25px;
            color: #fff;
        }

        .nav-logo img {
            width: 50px;
            height: 50px;
        }

        .usuario span {
            font-size: 25px;
            color: #fff;
            font-weight: bold;
        }

        .login-link {
            font-size: 25px;
            color: #fff;
            font-weight: bold;
        }

        .titulo {
            background: #fff;
            color: #20647F;
        }
    </Style>
    <title>MedicalCorp.</title>
</head>

<body>
    <nav class="barraNavegacion navbar navbar-expand-md navbar-dark fixed-top">
        <div class="nav-logo">
            <a href=""><img src="assets/images/Logo-Consultorio.png" alt="Logo"></a>
            <span><strong>Medical Corp.</strong></span>
        </div>
        <ul class="navbar-nav mr-auto">
            <!--crear enlaces segùn perfil de usuario-->
            <li class="nav-item"><a class="nav-link" href="index.php">Principal</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?c=Pacientes&f=index">Pacientes</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?c=Citas&f=index">Citas</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?c=Facturas&f=index">Facturas</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?c=Inventario&f=index">Inventario</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?c=index&f=index&p=contacto">Contacto</a></li>

        </ul>
        <ul class="navbar-nav ml-auto usuario">
            <li class="nav-item my-auto "><span>Usuario </span></li>
            <li class="nav-item"><a class="nav-link login-link" href="index.php?c=index&f=index&p=login">Login</a></li>

        </ul>
    </nav>

    <h1 class="jumbotron text-center titNivel1 titulo">
        <i class="fab fa-shopify"></i>
        Consultorio Medico MedicalCorp.
    </h1>

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    ;
    if (!empty($_SESSION['mensaje'])) {
        ?>
        <div class="mt-2 alert alert-<?php echo $_SESSION['color']; ?>
             alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['mensaje']; ?>
        </div>
        <?php
        unset($_SESSION['mensaje']);
        unset($_SESSION['color']);
    } //end if 
    ?>