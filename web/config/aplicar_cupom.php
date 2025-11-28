<?php
require_once __DIR__ . '../../app/repositores/Conecta.php';

$mensagem = "";
$descontos = 0;

// Só executa se clicou em "APLICAR"
if (isset($_POST['aplicar'])) {

    $codigo_digitado = strtoupper(trim($_POST['cupom']));

    $sql = "SELECT * FROM cupom
            WHERE codigo = :codigo
            AND ativo = 1
            AND CURDATE() BETWEEN valido_de AND valido_ate
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":codigo", $codigo_digitado);
    $stmt->execute();

    $cupom = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cupom) {

        $hoje = new DateTime();
        $valido_de = new DateTime($cupom['valido_de']);
        $valido_ate = new DateTime($cupom['valido_ate']);

        if ($hoje < $valido_de) {
            $mensagem = "<p style='color: red;'>Cupom ainda não está válido.</p>";
        } elseif ($hoje > $valido_ate) {
            $mensagem = "<p style='color: red;'>Cupom expirado.</p>";
        } else {
            
            if ($cupom['tipo'] === "porcentagem") {
                $descontos = $subtotal * ($cupom['valor'] / 100);
            } else {
                $descontos = $cupom['valor'];
            }

            $total_final = max(0, $subtotal - $descontos);

            $mensagem = "<p style='color: #4CAF50;'>Cupom <strong>$codigo_digitado</strong> aplicado!</p>";
        }

    } else {
        $mensagem = "<p style='color: red;'>Cupom inválido ou inativo.</p>";
    }
}
