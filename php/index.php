<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: ../index.html");
    exit;
}

?>



<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Homne</title>
</head>

<body>


    <aside class="sidebar">
        <div class="toggle">
            <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
        <div class="side-inner">
            <div class="profile">
                <img src="../assets/images/vazio.png" alt="Image" class="img-fluid">
                <h3 class="name"> <?php echo $_SESSION['UsuarioNome'] ?> </h3>
                <span class="country">Web Designer</span>
            </div>
            <div class="nav-menu">
                <ul>
                    <li class="accordion">
                        <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                            aria-controls="collapseOne" class="collapsible">
                            <span class="icon-home mr-3"></span>Feed
                        </a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                            <div>
                                <ul>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Sport</a></li>
                                    <li><a href="#">Health</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="accordion">
                        <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo" class="collapsible">
                            <span class="icon-search2 mr-3"></span>Explore
                        </a>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                            <div>
                                <ul>
                                    <li><a href="#">Interior</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Travel</a></li>
                                </ul>
                            </div>
                        </div>

                    </li>
                    <li><a href="#"><span class="icon-notifications mr-3"></span>Notifications</a></li>
                    <li><a href="projetos.php"><span class="icon-folder mr-3"></span>Projetos</a></li>
                    <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li>
                    <li><a href="logout.php"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
                </ul>
            </div>
        </div>

    </aside>


    <main style="background: #2c2c2c;">
        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
                </div>
            </div>
        </div>
    </main>



    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>