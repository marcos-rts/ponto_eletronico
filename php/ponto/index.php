<?php

session_start(); // Iniciar a sessao

// Definindo fuso horario padão para o PHP
date_default_timezone_set('America/Sao_Paulo')

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Registrar ponto</h2>

    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <p id="horario"><?php echo date("d/m/Y H:i:s"); ?></p>
    <a href="registrar_ponto.php">Registrar</a>
    <br>

    <script>
        var apHorario = document.getElementById("horario");

        function atualizarHorario(){
            // console.log('teste')
            // Definindo fuso horario padão para o JavaScript
            var data = new Date().toLocaleString("pt-br", {
                timeZone: "America/Sao_Paulo"
                }
            );
            var formatarData = data.replace (", ", " - ");
            apHorario.innerHTML = formatarData;
        }
        setInterval(atualizarHorario, 1000);
    </script>
</body>
</html>