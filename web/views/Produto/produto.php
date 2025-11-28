<?php
require_once __DIR__ . '/../../app/repositores/Conecta.php';

// pega o id do home
$id = $_GET['id'] ?? '';


if ($id == '') {
    die("Produto não encontrado.");
}

// Buscar produto no banco
$sql = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
$sql->execute([$id]);
$produto = $sql->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado no banco!");
}

// Dados do produto
$nome        = $produto['nome'];
$descricao   = $produto['descricao'];
$preco       = $produto['preco'];
//$img         = $produto['img']; 
$sku         = $produto['sku'];
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalhes do Produto <?php echo $nome; ?></title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/css/produto.css">
</head>

<body>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container-fluid">

      <!-- LOGO -->
      <a class="navbar-brand fw-bold" href="#">Logo</a>

      <!-- Search bar -->
      <form class="d-flex mx-auto search-wrapper">
        <input class="form-control search-input" type="search" placeholder="O que você está procurando?">
      </form>

      <!-- Right side icons -->
      <div class="d-flex align-items-center">
        <a href="#" class="me-3">
          <i class="bi bi-cart3 fs-4 text-white"></i>
        </a>

        <a href="#" class="text-white text-decoration-none fw-semibold">Iniciar Sessão</a>
      </div>

    </div>
  </nav>

  <!-- Barra superior -->
  <div class="bg-light border-bottom">
    <div class="container d-flex justify-content-center gap-4 py-2 fw-semibold">

      <a href="#" class="text-dark text-decoration-none">Promoções</a>

      <!-- Dropdown Hardware -->
      <div class="dropdown">
        <a class="dropdown-toggle text-dark text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
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
        <a class="dropdown-toggle text-dark text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
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

  <!-- Produto -->
  <div class="container mt-5 text-white">

    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo $img; ?>" alt="Imagem do Produto" class="img-fluid rounded">
      </div>

      <div class="col-md-6">
        <h2><?php echo $nome; ?></h2>

        <div class="mb-2">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star text-warning"></i>
          <i class="bi bi-star text-warning"></i>
        </div>

        <h4 class="text-success">R$  <?php echo number_format($preco, 2, ',', '.'); ?></h4>
        <p class="text-white">Produto Disponível</p>

<a href="/Projeto_ECommerce/web/views/Finalizar/finalizar.php?id=<?php echo $id; ?>" class="btn btn-primary me-2 ">Comprar Agora</a><br>
        <button class="btn btn-outline-secondary text-white">Adicionar ao Carrinho</button>
      </div>
    </div>

    <!-- Descrição -->
    <div class="mt-5">
      <h4>Descrição do Produto</h4>
      <p>
       <?php echo $descricao; ?>
      </p>
    </div>

    <!-- Avaliações -->
    <div class="mt-5">
      <h4>Avaliações dos Usuários</h4>

      <div class="border p-3 mb-2">
        <strong>User 1</strong>
        <p>Texto texto texto texto texto texto texto texto texto texto texto.</p>
      </div>

      <div class="border p-3 mb-2">
        <strong>User 2</strong>
        <p>Texto texto texto texto texto texto texto texto texto texto texto.</p>
      </div>

    </div>

  </div><br><br><br><br><br><br><br>

  <!-- Footer -->
  <footer class="text-white mt-5">
    <div class="container py-3 d-flex justify-content-between align-items-center flex-wrap">

      <div>
        <a href="#" class="text-white me-3 fs-4"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white me-3 fs-4"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
      </div>

      <div class="text-white d-flex flex-wrap gap-4">
        <span>E-mail: exemplo@gmail.com</span>
        <span>Telefone: (11) 0000-0000</span>
        <span>Atendimento ao Cliente</span>
      </div>

    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
