<?php
require_once __DIR__ . '/../../app/repositores/Conecta.php';

// Função para buscar produtos por categoria
function buscarProdutos($pdo, $categoriaID) {
    try {
        $sql = "SELECT * FROM produto WHERE categoria_id = :cat ORDER BY id DESC LIMIT 4";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['cat' => $categoriaID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return []; // evita warnings
    }
}

// Garantindo que NUNCA fiquem nulas
$produtos    = buscarProdutos($pdo, 1,2) ?? [];
$perifericos = buscarProdutos($pdo, 1) ?? [];
$pecas       = buscarProdutos($pdo, 2) ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/home.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Home</title>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="#">Logo</a>

            <form class="d-flex mx-auto search-wrapper">
                <input class="form-control search-input" type="search" placeholder="O que você está procurando?">
            </form>

            <div class="d-flex align-items-center">
                <a href="#" class="me-3">
                    <i class="bi bi-cart3 fs-4 text-white"></i>
                </a>
                <a href="#" class="text-white text-decoration-none fw-semibold">Iniciar Sessão</a>
            </div>

        </div>
    </nav>

    <!-- BARRA SUPERIOR -->
    <div class="bg-light border-bottom">
        <div class="container d-flex justify-content-center gap-4 py-2 fw-semibold">

            <a href="#" class="text-dark text-decoration-none">Promoções</a>

            <!-- DROPDOWN HARDWARE -->
            <div class="dropdown">
                <a class="dropdown-toggle text-dark text-decoration-none" href="#" data-bs-toggle="dropdown">Hardware</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Processadores</a></li>
                    <li><a class="dropdown-item" href="#">Placas-mãe</a></li>
                    <li><a class="dropdown-item" href="#">Placas de Vídeo</a></li>
                    <li><a class="dropdown-item" href="#">Memórias RAM</a></li>
                </ul>
            </div>

            <!-- DROPDOWN PERIFÉRICOS -->
            <div class="dropdown">
                <a class="dropdown-toggle text-dark text-decoration-none" href="#" data-bs-toggle="dropdown">Periféricos</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Teclados</a></li>
                    <li><a class="dropdown-item" href="#">Mouses</a></li>
                    <li><a class="dropdown-item" href="#">Headsets</a></li>
                    <li><a class="dropdown-item" href="#">Mousepads</a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- CARROSSEL -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../public/img/SUPER SALE(AGORA TA CERTO).png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../public/img/BLACK FRIDAY(AGORA TA CERTO).png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../public/img/SUPER SALE(AGORA TA CERTO).png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- LISTA DE PRODUTOS -->
    <div class="container py-4">

    <!-- ==================== PRODUTOS ==================== -->
    <h1 class="section-title">Produtos</h1>
    <div class="row g-4">

        <?php foreach ($produtos as $p): ?>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="product-card">
                <div class="product-img">
                    <img src="<?= htmlspecialchars($p['img']) ?>" alt="">
                </div>
                <h5 class="product-title"><?= htmlspecialchars($p['nome']) ?></h5>
                <p class="product-desc"><?= htmlspecialchars($p['descricao']) ?></p>
                <div class="product-price">R$ <?= number_format($p['preco'], 2, ',', '.') ?></div>
                <a href="/Projeto_ECommerce/web/views/Produto/produto.php?id=<?= $p['id'] ?>">
    <button class="btn-buy">Ver Produto</button>
</a>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <!-- ==================== PERIFÉRICOS ==================== -->
    <h1 class="section-title mt-5">Periféricos</h1>
    <div class="row g-4">

        <?php foreach ($perifericos as $p): ?>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="product-card">
                <div class="product-img">
                    <img src="<?= htmlspecialchars($p['img']) ?>" alt="">
                </div>
                <h5 class="product-title"><?= htmlspecialchars($p['nome']) ?></h5>
                <p class="product-desc"><?= htmlspecialchars($p['descricao']) ?></p>
                <div class="product-price">R$ <?= number_format($p['preco'], 2, ',', '.') ?></div>
                <a href="/Projeto_ECommerce/web/views/Produto/produto.php?id=<?= $p['id'] ?>">
    <button class="btn-buy">Ver Produto</button>
</a>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <!-- ==================== PEÇAS ==================== -->
    <h1 class="section-title mt-5">Peças</h1>
    <div class="row g-4">

        <?php foreach ($pecas as $p): ?>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="product-card">
                <div class="product-img">
                    <img src="<?= htmlspecialchars($p['img']) ?>" alt="">
                </div>
                <h5 class="product-title"><?= htmlspecialchars($p['nome']) ?></h5>
                <p class="product-desc"><?= htmlspecialchars($p['descricao']) ?></p>
                <div class="product-price">R$ <?= number_format($p['preco'], 2, ',', '.') ?></div>
                <a href="/Projeto_ECommerce/web/views/Produto/produto.php?id=<?= $p['id'] ?>">
    <button class="btn-buy">Ver Produto</button>
</a>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>
    <!-- FOOTER -->
    <footer class="text-white mt-5">
        <div class="container py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">

                <div class="mb-3 mb-md-0">
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
                </div>

                <div class="text-white d-flex flex-wrap gap-5">
                    <span>E-mail: exemplo@gmail.com</span>
                    <span>Telefone: (11) 0000-0000</span>
                    <span>Atendimento ao Cliente</span>
                </div>

            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
