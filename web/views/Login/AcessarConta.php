<?php
session_start();

$conn = new mysqli("localhost", "root", "", "projeto");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            // Salva dados na sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];

            // Redireciona de forma correta
            header("Location: /Projeto_ECommerce/web/views/Carrinho/carrinho.php");
            exit;
        } else {
            $mensagem = "<div class='alert alert-danger text-center mt-3'>Senha incorreta.</div>";
        }
    } else {
        $mensagem = "<div class='alert alert-warning text-center mt-3'>Email não cadastrado.</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Acessar Conta</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../public/css/AcessarConta.css">
</head>
<body>
<nav class="navbar border-bottom border-body" data-bs-theme="dark" id="nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Bit<span id="up">UP</span></a>
    </div>
</nav><br>

<div class="container-fluid" id="acesse">
    <div>
        <h1>Acessar conta</h1>
        <form action="/Projeto_ECommerce/web/views/Login/validarLogin.php" method="post">
            <div class="input-box">
                <input required type="text" class="input" id="email" name="email">
                <label class="label" for="email">
                    <span class="char" style="--index:0;padding-left:5px;">E</span>
                    <span class="char" style="--index:1;">m</span>
                    <span class="char" style="--index:2;">a</span>
                    <span class="char" style="--index:3;">i</span>
                    <span class="char" style="--index:4;padding-right:5px;">l</span>
                </label>
            </div>

            <div class="input-box">
                <input required type="password" class="input" id="senha" name="senha">
                <label class="label" for="senha">
                    <span class="char" style="--index:0;padding-left:5px;">S</span>
                    <span class="char" style="--index:1;">e</span>
                    <span class="char" style="--index:2;">n</span>
                    <span class="char" style="--index:3;">h</span>
                    <span class="char" style="--index:4;padding-right:5px;">a</span>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkSenha">
                <label class="form-check-label" for="checkSenha">Mostrar senha</label>
            </div>

            <button type="submit" class="btn b">Entrar</button>
        </form>

        <?php if (!empty($mensagem)) echo $mensagem; ?>
    </div>
</div>

<script>
const senhaInput = document.getElementById("senha");
const check = document.getElementById("checkSenha");

check.addEventListener("change", () => {
    senhaInput.type = check.checked ? "text" : "password";
});
</script>

</body>
</html>
