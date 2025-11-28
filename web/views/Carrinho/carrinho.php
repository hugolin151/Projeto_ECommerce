<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: /Projeto_ECommerce-main/web/views/Login/AcessarConta.php");
    exit;
}
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



    <link rel="stylesheet" href="/Projeto_ECommerce-main/web/public//css/carrinho.css">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">

            <!-- LOGO -->
            <a class="navbar-brand fw-bold" href="#">Logo</a>

            <!-- Search bar -->
            <form class="d-flex mx-auto search-wrapper">
                <input class="form-control search-input" type="search" placeholder="O que você está procurando?">
            </form>

            <!-- Right side icons and user section -->
            <div class="d-flex align-items-center">

                <!-- Ícone do carrinho -->
                <a href="#" class="me-3">
                    <i class="bi bi-cart3 fs-4 text-white"></i>
                </a>

                <?php if (isset($_SESSION['usuario_id'])): ?>

                    <!-- Saudação do usuário -->
                    <div class="dropdown me-3">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Olá, <?= htmlspecialchars($_SESSION['usuario_nome']) ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="/Projeto_ECommerce-main/web/views/Login/logout.php">Sair</a></li>
                        </ul>
                    </div>

                <?php else: ?>

                    <!-- Se o usuário não estiver logado, exibe a opção de login -->
                    <a href="/Projeto_ECommerce-main/web/views/Login/Login.php" class="btn btn-outline-light btn-sm fw-semibold">
                        Iniciar Sessão
                    </a>

                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Barra de links superior -->
    <div class="bg-light border-bottom">
        <div class="container d-flex justify-content-center gap-4 py-2 fw-semibold">

            <a href="#" class="text-dark text-decoration-none">
                Promoções
            </a>

            <!-- Dropdown Hardware -->
            <div class="dropdown">
                <a class="dropdown-toggle text-dark text-decoration-none" href="#" role="button"
                    data-bs-toggle="dropdown">
                    Hardware
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Processadores</a></li>
                    <li><a class="dropdown-item" href="#">Placas-mãe</a></li>
                    <li><a class="dropdown-item" href="#">Placas de Vídeo</a></li>
                    <li><a class="dropdown-item" href="#">Memórias RAM</a></li>
                </ul>
            </div>

            <!-- Dropdown Periféricos -->
            <div class="dropdown">
                <a class="dropdown-toggle text-dark text-decoration-none" href="#" role="button"
                    data-bs-toggle="dropdown">
                    Periféricos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Teclados</a></li>
                    <li><a class="dropdown-item" href="#">Mouses</a></li>
                    <li><a class="dropdown-item" href="#">Headsets</a></li>
                    <li><a class="dropdown-item" href="#">Mousepads</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container my-5">

        <h2 class="text-white fw-semibold mb-4">Carrinho</h2>

        <div class="row">

            <!-- Lista de produtos -->
            <div class="col-lg-8">

                <div class="card text-white p-3 mb-3 pro">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-semibold">Produto</span>
                        <a href="#" class="text-white text-decoration-none">LIMPAR CARRINHO</a>
                    </div>

                    <!-- Produto -->
                    <div class="d-flex align-items-center p-3 rounded pro2">

                        <!-- Imagem -->
                        <div class="me-3">
                            <img src="URL-DA-SUA-IMAGEM-AQUI.jpg" alt="Produto" class="img-produto">
                        </div>

                        <!-- Informações -->
                        <div class="flex-grow-1">

                            <p class="mb-1 fw-semibold">
                                SSD Kingston NV2, 1TB, M.2 2280, PCIe NVMe<br>
                                Leitura 3500MB/s Gravação 2100MB/s
                            </p>

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

            <!-- Resumo -->
            <div class="col-lg-4">

                <div class="card text-white p-4 pro">

                    <h5 class="mb-3">Resumo</h5>

                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span id="subtotal">R$ 0,00</span>
                    </div>

                    <hr class="border-secondary">

                    <div class="d-flex justify-content-between fw-semibold fs-5">
                        <span>Total</span>
                        <span id="total">R$ 0,00</span>
                    </div>

                    <div class="mt-3">
                        <p class="text-success fw-bold mb-1" id="pix-price">R$ 0,00</p>
                        <small>no PIX com 15% desconto</small>

                        <p class="text-danger fw-bold mt-3 mb-1" id="card-price">R$ 0,00</p>
                        <small>em até 12x de R$ 0,00 sem juros no cartão</small>
                    </div>

                    <button class="btn  w-100 mt-4 py-2 fw-semibold b">FINALIZAR COMPRA</button>
                    <button class="btn btn-light w-100 mt-2 py-2 fw-semibold">CONTINUAR COMPRANDO</button>

                </div>

                <!-- ACCORDION -->
                <div class="accordion mt-4 " id="accordionExtras">

                    <!-- Frete e Prazos -->
                    <div class="accordion-item text-white pro">
                        <h2 class="accordion-header ">
                            <button class="accordion-button pro text-white seta" type="button" data-bs-toggle="collapse"
                                data-bs-target="#frete">
                                Frete e Prazos
                            </button>
                        </h2>
                        <div id="frete" class="accordion-collapse collapse " data-bs-parent="#accordionExtras">
                            <div class="accordion-body ">
                                <input type="text" placeholder="Digite seu CEP" class="form-control mb-2">
                                <button class="btn btn-primary w-100">Calcular</button>
                            </div>
                        </div>
                    </div>

                    <!-- Cupom -->
                    <div class="accordion-item pro text-white ">
                        <h2 class="accordion-header">
                            <button class="accordion-button pro text-white seta" type="button" data-bs-toggle="collapse"
                                data-bs-target="#cupom">
                                Cupom de Desconto
                            </button>
                        </h2>
                        <div id="cupom" class="accordion-collapse collapse" data-bs-parent="#accordionExtras">
                            <div class="accordion-body">
                                <input type="text" placeholder="Digite seu cupom" class="form-control mb-2">
                                <button class="btn btn-success w-100">Aplicar Cupom</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76A08GgCPSGdFN3tFz5b9dC0rY9FfN8Kp3RrZgWv5zF8Hk5j0k5L5W4nY1f3x4l"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.btn-plus').forEach((btn) => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.qty-input');
                input.value = parseInt(input.value) + 1;
            });
        });

        document.querySelectorAll('.btn-minus').forEach((btn) => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.qty-input');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.btn-plus').forEach((btn) => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.qty-input');
                input.value = parseInt(input.value) + 1;
            });
        });

        document.querySelectorAll('.btn-minus').forEach((btn) => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.qty-input');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });
    </script>
</body>

</html>
