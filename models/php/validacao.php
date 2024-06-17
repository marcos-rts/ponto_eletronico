<?php

// Verificando se houve POST e se o usuario ou a senha são vazios
if (!empty($_POST) AND (empty($_POST['login']) OR empty(['senha']))) {
    header("Location: ../../index.html");
}

// Tenta se conectar ao servidor MySQL
$conect = msqli_connect('viaduct.proxy.rlwy.net', 'root', 'EJqgDXHdlmpEtmtGosdNiyCzZvgFrTdE', 'novosistema');

// tenta se conectar a um banco de dados MySQL
$login = $_POST['login'];
$senha = $_POST['senha'];


?>