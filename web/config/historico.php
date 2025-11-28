<?php
require_once __DIR__ . '../../app/repositores/Conecta.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM produto WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->execute();

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado.");
}

$subtotal = $produto["preco"];
$descontos = 0;
$total_final = $subtotal;
$avista = $total_final; 
$parcelas = $total_final/12;
$sql = $pdo->query("SELECT * FROM historico ORDER BY id DESC LIMIT 1");
$pedido = $sql->fetch(PDO::FETCH_ASSOC);

if (!$pedido) {
    die("Nenhum histórico encontrado!");
}
// Tabela de fretes por estado
$fretes_estado = [
    "AC" => 39.90,
    "AL" => 34.90,
    "AP" => 42.90,
    "AM" => 49.90,
    "BA" => 29.90,
    "CE" => 27.90,
    "DF" => 19.90,
    "ES" => 24.90,
    "GO" => 22.90,
    "MA" => 31.90,
    "MT" => 32.90,
    "MS" => 33.90,
    "MG" => 21.90,
    "PA" => 44.90,
    "PB" => 26.90,
    "PR" => 18.90,
    "PE" => 25.90,
    "PI" => 30.90,
    "RJ" => 15.90,
    "RN" => 28.90,
    "RS" => 17.90,
    "RO" => 45.90,
    "RR" => 46.90,
    "SC" => 16.90,
    "SP" => 12.90,
    "SE" => 29.90,
    "TO" => 35.90
];

// Agora é só usar normalmente:
$nome        = $pedido['nome'];
$email       = $pedido['email'];
$cpf         = $pedido['cpf'];
$telefone    = $pedido['telefone'];

$destinatario = $nome;


$cep         = $pedido['cep'];
$endereco    = $pedido['endereco'] . ", " . $pedido['numero'];
$bairro      = $pedido['bairro'];
$complemento = $pedido['complemento'];
$estado      = $pedido['estado'];
$cidade      = $pedido['cidade'];


$subtotal = $pedido['subtotal'];
$frete = $fretes_estado[$estado] ?? "";
$total    =  $subtotal + $frete;

$tipo_pagamento = $pedido['tipo_pagamento'];
$metodo_pagamento = $tipo_pagamento;



?>
