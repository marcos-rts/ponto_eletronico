<?php

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    header("Location: ../index.html"); exit;
}

// Tenta se conectar ao servidor MySQL
$conect = mysqli_connect('localhost', 'root', '', 'sistema_ponto') or trigger_error(mysql_error());
// Tenta se conectar a um banco de dados MySQL

$login = $_POST['login'];
$senha = $_POST['senha'];

// Validação do usuário/senha digitados
$sql = "SELECT `id` FROM `usuarios` WHERE (`cod_login` = '".$login ."') AND (`3cpf` = '".$login ."') AND (`ativo` = 1) LIMIT 1";
$query = mysqli_query($conect, $sql);
if (mysqli_num_rows($query) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "Login inválido!"; exit;
} else {
    // Salva os dados encontados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
    // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();

      // // Salva os dados encontrados na sessão
      // $_SESSION['UsuarioID'] = $resultado['id'];
      // $_SESSION['UsuarioNome'] = $resultado['nome'];
      // $_SESSION['UsuarioNivel'] = $resultado['nivel'];

      // Redireciona o visitante
      header("Location: ../page/index.html"); exit;
}

  ?>