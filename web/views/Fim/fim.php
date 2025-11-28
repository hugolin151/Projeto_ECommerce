<?php
require_once __DIR__ . '/../../app/repositores/Conecta.php';
require __DIR__ . '/../../config/historico.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">



    <link rel="stylesheet" href="../../public/css/fim.css">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">

            <!-- LOGO -->
            <a class="navbar-brand fw-bold" href="#">Logo</a>

            <!-- Search bar -->
            <form class="d-flex mx-auto search-wrapper">
                     <input class="form-control search-input text-dark bg-white placeholder-dark" type="search" placeholder="O que você está procurando?">
            </form>

            <!-- Right side icons -->
            <div class="d-flex align-items-center">
                <a href="#" class="me-3">
                    <i class="bi bi-cart3 fs-4 text-white"></i>
                </a>

                <a href="#" class="text-white text-decoration-none fw-semibold">
                    Iniciar Sessão

                </a>
            </div>
        </div>
    </nav>

    <header class="sla" style="background-color: #DBDBDB;">

    <ul class="menu-list">

       <div><li><a href="#" style="color: white; text-decoration: none;"><span class="menu-btn">Promoções</span></a></li></div> 

        <!-- MENU HARDWARE -->
        <li class="menu-item">
            <span class="menu-btn">Hardware <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg></span>

            <div class="dropdown">

                <div class="drop-item item-toggle">
                    Processadores <span class="seta"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg></span>
                </div>

                <div class="sub-menu">
                    <a href="#">Intel</a>
                    <a href="#">AMD</a>
                </div>

                <a class="drop-item" href="#">Placa Mãe</a>
                <a class="drop-item" href="#">Memórias</a>

            </div>
        </li>

        <!-- MENU PERIFÉRICOS -->
        <li class="menu-item">
            <span class="menu-btn">Periféricos <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg></span>

            <div class="dropdown">
                <a class="drop-item" href="#">Monitor</a>
                <a class="drop-item" href="#">Mouse</a>
            </div>
        </li>

    </ul>

</header>
<br><br>



    <div class="container my-12">
<h1 class="lado">Finalize seu pedido</h1>
<h5 class="lado">Revise seu pedido e finalize</h5>
<br>
    <div class="row g-1">

        <!-- COLUNA ESQUERDA: PRODUTO + REVISÃO -->
        <div class="col-lg-6">

            <!-- PRODUTO -->
            <div class="card text-white p-1 pro">

                <div class="card text-white p-3 mb-2 pro">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-semibold">Produto</span>
                        <a href="#" class="text-white text-decoration-none">LIMPAR CARRINHO</a>
                    </div>

                    <div class="d-flex align-items-center p-2 rounded pro2">

                        <!-- Imagem -->
                        <div class="me-3">
                            <img src="URL-DA-SUA-IMAGEM-AQUI.jpg" alt="Produto" class="img-produto">
                        </div>

                        <!-- Informações -->
                        <div class="flex-grow-1">

                        <?php foreach ($itens as $item): ?>
                            <div class="item">
                                <h5><?= $item['nome_produto'] ?></h5>
                                <p>Preço: R$ <?= number_format($item['preco'], 2, ",", ".") ?></p>
                                <p>Quantidade: <?= $item['quantidade'] ?></p>
                            </div>
                            <hr>
                            <?php endforeach; ?>

                            <small class="text-light">
                                Preço no cartão em até 12x sem juros:
                                <span class="fw-bold">R$ 0,00</span>
                            </small>
                            <br>
                            <small>ID: 123456789</small>

                        </div>

                        <!-- Quantidade -->
                        <div class="d-flex align-items-center ms-3">
                            <button class="btn btn-outline-light btn-sm btn-minus">-</button>
                            <input type="text" class="form-control text-center mx-2 qty-input" value="1"
                                style="width:45px;">
                            <button class="btn btn-outline-light btn-sm btn-plus">+</button>
                        </div>

                    </div>

                </div>

            </div>

            <!-- REVISAR PEDIDO (ABAIXO DO PRODUTO) -->
            <div class="mt-4 p-4" style="background:#1a1a1a; border-radius:8px; color:white;">

                <div class="row">
                <!-- Meus Dados -->
                <div class="section mb-4">
                    <div class="section">
                    <h2>Meus Dados</h2>
                    </div>
                    <br>
                    <p>NOME: <?= $nome ?> (<?= $email ?>)</p>
                    <p>CPF: <?= $cpf ?></p>
                </div>
                </div>

                <!-- Entrega + Pagamento -->
                <div class="row section">

                    <div class="col-md-5">
                        <h2>Entrega</h2>
                        <p>Destinatário: <?= $destinatario ?></p>
                        <p>Endereço:<?= $endereco ?></p>
                        <p><?= $bairro ?> - <?= $cidade ?>/<?= $estado ?></p>
                        <p>CEP: <?= $cep ?></p>
                    </div>

                    <div class="col-md-6">
                       <h2>Pagamento</h2>
                       <p><?= $metodo_pagamento ?></p>
                       <p>Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
                       <p>Frete: R$ <?= number_format($frete, 2, ',', '.') ?></p>
                       <p><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
                    </div>

                </div>

            </div>

        </div>

        <!-- COLUNA DIREITA: RESUMO -->
        <div class="col-lg-5 col-md-6">

            <div class="p-4 rounded" style="background:#1f1f1f; color:white; max-width: 500px;">

                <h4 class="text-center mb-3">Resumo</h4>

                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span>R$ <?= number_format($subtotal ?? 0, 2, ",", ".") ?></span>
                </div>

                <hr>

                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Total</span>
                    <span>R$ <?= number_format($total ?? 0, 2, ",", ".") ?></span>
                </div>

                <div class="mt-4 text-center">

                    <p class="text-success mb-1">À vista</p>
                    <p class="fw-bold text-success fs-5">R$ <?= number_format($avista ?? 0, 2, ",", ".") ?></p>

                    <p class="text-light">com cupom desconto</p>

                    <p class="text-danger fw-bold fs-5">
                        R$ <?= number_format($total_final ?? 0, 2, ",", ".") ?>
                    </p>

                    <p class="text-light">
                        em até 12x de 
                        <span class="text-decoration-line-through">
                            R$ <?= number_format($parcelas ?? 0, 2, ",", ".") ?>
                        </span> <br> 
                        sem juros no cartão
                    </p>

                </div>

                <button class="btn w-100 mt-4 py-2 fw-semibold b">FINALIZAR COMPRA</button>
                <button class="btn btn-light w-100 mt-2 py-2 fw-semibold">CONTINUAR COMPRANDO</button>

            </div>

        </div>

    </div>
</div>

<script src="/Projeto_ECommerce/web/public/js/aumentar.js"></script>
 <script src="/Projeto_ECommerce/web/public/js/java.js"></script>
</body>

</html>