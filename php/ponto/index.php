<?php

session_start(); // Iniciar a sessao
require '../banco.php';

// Definindo fuso horario padão para o PHP
date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: ../index.html");
    exit;
}
// zera o id
$_SESSION['id_project'] = null;

// busca o id do GET
if (!empty($_GET['id'])) 
{
    $_SESSION['id_project'] = $_REQUEST['id'];
}

// verifica se o resultado é nulo
if (null == $_SESSION['id_project']) 
{
    header("Location: index.php");
}else{
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM projetos where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['id_project']));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}

switch (date('m')){
    case 1:
        $MesExtend = "Janeiro";
    case 2:
        $MesExtend = "Fevereiro";
    case 3:
        $MesExtend = "Março";
    case 4:
        $MesExtend = "Abril";
    case 5:
        $MesExtend = "Maio";
    case 6:
        $MesExtend = "Junho";
    case 7:
        $MesExtend = "Julho";
    case 8:
        $MesExtend = "Agosto";
    case 9:
        $MesExtend = "Setembro";
    case 10:
        $MesExtend = "Outubro";
    case 11:
        $MesExtend = "Novembro";
    case 12:
        $MesExtend = "Dezembro";    
};
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link rel="stylesheet" href="../../assets/css/projeto.css">

    <title>Ponto - <?php echo $data['nome'] ?></title>
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
                <img src="../../assets/images/vazio.png" alt="Image" class="img-fluid">
                <h3 class="name"> <?php echo $_SESSION['UsuarioNome'] ?> </h3>
                <!-- <span class="country">Web Designer</span> -->
            </div>
            <div class="nav-menu">
                <ul>
                    <!-- <li class="accordion">
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
                    </li> -->

                    <!-- <li class="accordion">
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
                    </li> -->

                    <li><a href="../index.php"><span class="icon-home mr-3"></span>Inicio</a></li>

                    <li><a href="../page/profile.php"><span class="icon-user mr-3"></span>Perfil</a></li>
                    
                    <li><a href="../page/projetos.php"><span class="icon-folder mr-3"></span>Projetos</a></li>
                    
                    <!-- <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li> -->
                    
                    <li><a href="../logout.php"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
                </ul>
            </div>
        </div>

    </aside>

    <main style="background: #2c2c2c;">
        <div class="site-section">
            <div class="container">
                <h1 id="titulo">Registrar ponto</h1>
                <h2 id="titulo2">Projeto: <?php echo $data['nome'] ?></h2>
                <div class="row">



                    <?php
    // if(isset($_SESSION['msg'])){
    //     echo $_SESSION['msg'];
    //     unset($_SESSION['msg']);
    // }
    ?>
                    <hr>
                    <div class="col-6">
                        <!-- <p id="horario"><?php echo date("d/m/Y H:i:s"); ?></p> -->
                        <!-- <a href="registrar_ponto.php">Registrar</a> -->
                        <br>
                        <p>
                            <a href="<?php $data['link_repo'] ?>">
                                <img id="logo" src="../../assets/images/svg/logo-github.svg"></img>
                            </a>
                        </p>
                        <p>
                            Se for a primieira vez neste projeto ira precisar clonar o projeto e cadastrar o caminho do
                            codigo:
                            <br>
                            Clonando e adicionando caminho:
                            <br>
                            <br>
                            <code>
                                git branch -M main
                                <br>
                                git clone www.teste.com
                                <br>
                                git remote add origin https://github.com/alexandre824/Site-vendas
                            </code>
                            <br>
                            <br>
                            Se ja esta trabalhando neste projeto, puxe as atualizações
                        </p>
                    </div>
                    <div id="box" class="col-6 justify-content-center">
                        <div id="dia">
                            <p><?php echo date("d"); ?></p>
                        </div>
                        <div id="mes">
                            <p><?php echo $MesExtend; ?></p>
                        </div>
                        <div id="ano">
                            <p><?php echo date("Y"); ?></p>
                        </div>
                        <div id="hora">
                            <br>
                            <p id="horario"><?php echo date("d/m/Y H:i:s"); ?></p>
                            <a class="btn btn-light" href="registrar_ponto.php">Registrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main style="background: #2c2c2c;">
        <div class="site-section">
            <div class="container">
            </div>
        </div>
    </main>

    <script>
    var apHorario = document.getElementById("horario");

    function atualizarHorario() {
        // console.log('teste')
        // Definindo fuso horario padão para o JavaScript
        var data = new Date().toLocaleString("pt-br", {
            timeZone: "America/Sao_Paulo"
        });
        var formatarData = data.replace(", ", " - ");
        apHorario.innerHTML = formatarData;
    }
    setInterval(atualizarHorario, 1000);
    </script>

    <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>