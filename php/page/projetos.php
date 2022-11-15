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

    <link rel="stylesheet" href="../../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="../../assets/css/style.css">


    <title>Home</title>
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
                <div class="row justify-content-center">

                    <div class="card-deck">
                        <?php
                        $pagina = (isset($_GET['pagina']))? $_GET ['pagina'] : 1;
                        include '../banco.php';
                        $pdo = Banco::conectar();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        // selecionar todos itens da tabela
                        $sql = 'SELECT * FROM projetos';
                        // contar total de dados
                        $total = 0;

                        $sql = $pdo->query($sql);
                        $total = $sql->rowCount();
                        // $total = mysqli_num_rows($sql);

                        // Setar a quantidade de dados por pagina
                        $quantidade_pg = 3;

                        // calcular o numero de paginas necessarias para paresentar os dados 
                        $num_pagina = ceil($total/$quantidade_pg);

                        // calcular o inicio da visualização 
                        $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;


                        // selecionar os itens a serem apresentados na pagina

                        $result = 'SELECT * FROM projetos LIMIT '.$inicio.', '. $quantidade_pg;

                        $result2 = $result;    
                        foreach ($pdo->query($result2) as $row) {
                        ?>
                        <div class="card">
                            <!-- <img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card"> -->
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $row['nome']?> </h5>
                                <p class="card-text"> <?php echo $row['descricao'] ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="../ponto/index.php?id=<?php echo $row['id'] ?>"
                                    class="btn btn-primary">Visitar</a>
                                <!-- <a href="https://github.com/alexandre824/controle-de-equipamento" class="btn btn-primary">Github</a> -->
                            </div>
                        </div>
                        <?php }; ?>
                    </div>


                    <div class="container">
                        <br>
                        <br>
                        <div class="justify-content-center">
                            <?php
                        // verirficar pagina anterior e posterior
                        $pagina_anterior = $pagina - 1;
                        $pagina_posterior = $pagina + 1;
                        ?>
                            <nav aria-label="Navegação de página exemplo" class="text-center">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <?php
                                    if($pagina_anterior !=0){
                                    ?>
                                        <a class="page-link" href="projetos.php?pagina=<?php echo $pagina_anterior ?>"
                                            aria-label="Anterior">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Anterior</span>
                                        </a>
                                        <?php } ?>
                                    <li class="page-item">
                                        <?php
                                    if($pagina_posterior <= $num_pagina){
                                    ?>
                                        <a class="page-link" href="projetos.php?pagina=<?php echo $pagina_posterior ?>"
                                            aria-label="Próximo">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Próximo</span>
                                        </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </main>



    <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>