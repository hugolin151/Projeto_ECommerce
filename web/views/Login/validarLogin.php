<?php
session_start();
require_once __DIR__ . "/../../app/repositores/Conecta.php";

// CRIA A CONEXÃO USANDO A CLASSE
$conn = $pdo;

// CAPTURA OS CAMPOS DO FORMULÁRIO
$email = $_POST['email'];
$senha = $_POST['senha'];

// VALIDA SE O USUÁRIO EXISTE NO BANCO
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {

    // VALIDA SENHA
    if (password_verify($senha, $result['senha'])) {

        // CRIA A SESSÃO
        $_SESSION['usuario_id'] = $result['id'];
        $_SESSION['usuario_nome'] = $result['nome'];

        // REDIRECIONA PARA O CARRINHO
        header("Location: /Projeto_ECommerce/web/views/Home/home.php");
        exit;
    }
}

// SE CHEGAR AQUI = LOGIN FALHOU
header("Location: /Projeto_ECommerce-main/web/views/Login/AcessarConta.php?erro=1");
exit;
