<?php
// ------------------- CONEXÃO -------------------
require_once __DIR__ . '/../../app/repositores/Conecta.php';

     // Calcula valores
require_once __DIR__ . '/../../config/resumo.php';
require_once __DIR__ . '/../../config/aplicar_cupom.php'; // Valida cupom, se enviado




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finalizar Pedido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../public/css/finalizar.css">
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

      <div>
        <li><a href="#" style="color: white;"><span class="menu-btn">Promoções</span></a></li>
      </div>

      <!-- MENU HARDWARE -->
      <li class="menu-item">
        <span class="menu-btn">Hardware <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
          </svg></span>

        <div class="dropdown">

          <div class="drop-item item-toggle">
            Processadores <span class="seta"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
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
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
          </svg></span>

        <div class="dropdown">
          <a class="drop-item" href="#">Monitor</a>
          <a class="drop-item" href="#">Mouse</a>
        </div>
      </li>

    </ul>

  </header>
  <br><br>


  <div class="container mt-4">

    <div class="row">

      <!-- FORMULÁRIO ESQUERDA -->
      <div class="col-lg-6 col-md-12">

        <h1 class="branco mb-4">Finalize o seu pedido</h1>

        <h4 class="branco">Informações pessoais</h4>

        <form id="form1">

          <div class="row g-3 mt-1">

            <div class="col-md-6 col-12">
              <input type="text" name="nome" id="final_nome" class="form-control" placeholder="Nome Completo">
            </div>

            <div class="col-md-6 col-12">
              <input type="text" name="cpf"  id="final_cpf" class="form-control" placeholder="CPF">
            </div>

            <div class="col-md-6 col-12">
              <input type="email" name="email" id="final_email" class="form-control" placeholder="Email">
            </div>

            <div class="col-md-6 col-12">
              <input type="text" name="telefone" id="final_telefone" class="form-control" placeholder="Num. Telefone">
            </div>
            <div class="col-md-12 col-12">
             
            </div>

          </div>

        </form>


        <h4 class="branco mt-4">Adicionar endereço</h4>

        <form id="form2">

          <div class="row g-3 mt-1">

            <div class="col-12">
              <input type="text" name="cep" id="final_cep" class="form-control" placeholder="CEP">
            </div>

            <div class="col-md-8 col-12">
              <input type="text" name="endereco" id="final_endereco" class="form-control" placeholder="Endereço (Rua,Avenida...)">
            </div>

            <div class="col-md-4 col-12">
              <input type="text" name="numero" id="final_numero" class="form-control" placeholder="Número">
            </div>

            <div class="col-md-6 col-12">
              <input type="text" name="bairro" id="final_bairro" class="form-control" placeholder="Bairro">
            </div>

            <div class="col-md-6 col-12">
              <input type="text" name="complemento" id="final_complemento" class="form-control" placeholder="Complemento">
            </div>

            <div class="col-md-6 col-12">
              <input type="text" name="estado" onblur="validarEstado()"  id="final_estado" oninput="this.value = this.value.toUpperCase().replace(/[0-9]/g, '')" maxlength="2" class="form-control" placeholder="Estado/Sigla">
       <small id="erro_estado" style="color: red; display: none;"></small>
            </div>

            <div class="col-md-6 col-12">
              <input type="text" name="cidade" id="final_cidade" class="form-control" placeholder="Cidade">
            </div>
            <div class="col-md-12 col-12">
              
            </div>
          </div>

        </form>

      </div>


      <!-- RESUMO DIREITA -->
      <div class="col-lg-5 offset-lg-1 col-md-12 mt-5 mt-lg-0">

        <div class="resumo-box">

          <h4 class="text-center mb-3" style="color: white;">Resumo</h4>

          <div class="linha" style="color: white;">
            <span>SubTotal</span>
            <span>R$ <?php echo number_format($subtotal, 2, ",", "."); ?></span>
          </div>

          <div class="total d-flex justify-content-between">
            <span>Total</span>
            <span>R$ <?php echo number_format($total_final, 2, ",", "."); ?></span>
          </div>

          <div class="texto-centro mt-3">

            <p class="text-success">À vista</p>

            <p class="valor-verde">R$ <?php echo number_format($avista, 2, ",", "."); ?></p>

            <p class="branco">com cupom desconto</p>

            <p class="valor-vermelho">R$ <?php echo number_format($total_final, 2, ",", "."); ?></p>

            <p class="branco">
              em até 12x de
              <span class="risco">
                R$ <?php echo number_format($parcelas, 2, ",", "."); ?>
              </span><br>
              sem juros no cartão
            </p>


          </div>

        </div>

      </div>

    </div>
  </div>


  <!-- SEGUNDO RESUMO (CUPOM) -->
  <div class="container mt-0">

    <div class="row justify-content-end">

      <div class="col-lg-5 col-md-6">

        <div class="resumo-box">

          <h4 class="text-center mb-3 text-white">Resumo</h4>

          <div class="linha text-white">
            <span>SubTotal:</span>
            <span><?php echo "R$ " . number_format($subtotal, 2, ",", "."); ?></span>
          </div>

          <form method="POST">

            <label for="cupom" class="text-white">Cupom de desconto:</label>

            <div class="input-group mb-2">
              <input type="text" name="cupom" id="cupom" class="form-control" placeholder="DIGITE O CUPOM">
              <button type="submit" name="aplicar" class="btn btn-primary">Aplicar</button>
            </div>

            <?php echo $mensagem; ?>

          </form>

          <div class="total mt-3">
            <strong>Total:</strong>
            <strong><?php echo "R$ " . number_format($total_final, 2, ",", "."); ?></strong>
          </div>

          <?php if ($descontos > 0) { ?>
            <p class="text-success">
              Você economizou
              <strong><?php echo "R$ " . number_format($descontos, 2, ",", "."); ?></strong>
            </p>
          <?php } ?>

        </div>

      </div>

    </div>
  </div>




  <div class="container mt-5">

    <h3 class="text-white mt-4">Método de Pagamento</h3>

    <div class="accordion mt-3" id="accordionPagamento">

      <!-- CARTÃO DE CRÉDITO -->
      <div class="accordion-item bg-dark text-white">
        <h2 class="accordion-header">
          <button class="accordion-button metodo text-white collapsed" data-metodo="credito" style="background-color: #353434 ;" type="button" data-bs-toggle="collapse"
            data-bs-target="#credito">
            Cartão de Crédito
          </button>
        </h2>

        <div id="credito" class="accordion-collapse collapse" data-bs-parent="#accordionPagamento">
          <div class="accordion-body">

            <form id="form3">
              <div class="row mb-3">
                <div class="col-md-10 col-12 mb-2">
                  <input type="text" name="numcartao" class="form-control mb-3" placeholder="Número do Cartão" maxlength="19" required>
                </div>
                <div class="col-md-2 col-12 mb-2">
                  <input type="text" name="cvv" class="form-control mb-3" placeholder="CVV" maxlength="4" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6 col-12 mb-2">
                  <input type="text" name="mes" class="form-control" placeholder="Mês Validade" maxlength="2" required>
                </div>
                <div class="col-md-6 col-12">
                  <input type="text" name="ano" class="form-control" placeholder="Ano Validade" maxlength="4" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-8 col-12 mb-2">
                  <input type="text" name="titular" class="form-control" placeholder="Nome do Titular" required>
                </div>
                <div class="col-md-4 col-12">
                  <input type="text" name="cpf2" class="form-control" placeholder="CPF" maxlength="14" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 col-12">
                  <select class="form-select mb-3" required>
                    <option disabled selected>Parcelas</option>
                    <?php for ($x = 1; $x <= 12; $x++) echo "<option>$x x</option>"; ?>
                  </select>
                </div>
              </div>
              
            </form>

          </div>
        </div>
      </div>

      <!-- CARTÃO DE DÉBITO -->
      <div class="accordion-item bg-dark text-white mt-3">
        <h2 class="accordion-header">
          <button class="accordion-button metodo text-white collapsed" data-metodo="debito" style="background-color: #353434 ;" type="button" data-bs-toggle="collapse"
            data-bs-target="#debito">
            Cartão de Débito
          </button>
        </h2>

        <div id="debito" class="accordion-collapse collapse" data-bs-parent="#accordionPagamento">
          <div class="accordion-body">

            <form id="form4">
              <div class="row mb-3">
                <div class="col-md-10 col-12 mb-2">
                  <input type="text" name="numcartao" class="form-control mb-3" placeholder="Número do Cartão" maxlength="19" required>
                </div>
                <div class="col-md-2 col-12 mb-2">
                  <input type="text" name="cvv" class="form-control mb-3" placeholder="CVV" maxlength="4" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6 col-12 mb-2">
                  <input type="text" name="mes" class="form-control" placeholder="Mês Validade" maxlength="2" required>
                </div>
                <div class="col-md-6 col-12">
                  <input type="text" name="ano" class="form-control" placeholder="Ano Validade" maxlength="4" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-8 col-12 mb-2">
                  <input type="text" name="titular" class="form-control" placeholder="Nome do Titular" required>
                </div>
                <div class="col-md-4 col-12">
                  <input type="text" name="cpf2" class="form-control" placeholder="CPF" maxlength="14" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 col-12">
                  <select class="form-select mb-3" required>
                    <option disabled selected>Parcelas</option>
                    <?php for ($x = 1; $x <= 12; $x++) echo "<option>$x x</option>"; ?>
                  </select>
                </div>
              </div>

              <button class="btn btn-light w-100">Salvar & Continuar</button>
            </form>

          </div>
        </div>
      </div>
<small id="erro_pagamento" style="color: red; display: none; font-size: 14px;"></small>
    </div>

    

    <form id="final" action="/Projeto_ECommerce/web/config/processarPedido.php" method="POST">

    <input type="hidden" name="nome" id="h_nome">
    <input type="hidden" name="cpf" id="h_cpf">
    <input type="hidden" name="email" id="h_email">
    <input type="hidden" name="telefone" id="h_telefone">

    <input type="hidden" name="cep" id="h_cep">
    <input type="hidden" name="endereco" id="h_endereco">
    <input type="hidden" name="numero" id="h_numero">
    <input type="hidden" name="bairro" id="h_bairro">
    <input type="hidden" name="complemento" id="h_complemento">
    <input type="hidden" name="estado" id="h_estado">
    <input type="hidden" name="cidade" id="h_cidade">

    <input type="hidden" name="subtotal" value="<?= $subtotal ?>">
    <input type="hidden" name="frete" value="<?= $frete ?>">
    <input type="hidden" name="total" value="<?= $total_final ?>">

    <input type="hidden" name="tipo_pagamento" id="tipo_pagamento">
    <!-- BOTÃO FINAL -->
      <button type="submit" id="salvarTudo" class="btn btn-primary w-100 mt-4">
        Salvar e Ver Detalhes da Entrega
      </button>
</form>
  </div>

<footer class="footer-custom">
    <div class="footer-line"></div>

    <div class="footer-content">

        <div class="footer-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
        </div>

        <a href="#" class="footer-text">E-mail: exemplo@gmail.com</a>
        <a href="#" class="footer-text">Telefone: (11) 0000-0000</a>
        <a href="#" class="footer-text">Atendimento ao Cliente</a>

    </div>
</footer>

  
<script src="/Projeto_ECommerce/web/public/js/tudo.js"></script>

<script src="/Projeto_ECommerce/web/public/js/validarEstado.js"></script>

  <script src="/Projeto_ECommerce/web/public/js/salvar.js"></script>
  <!-- Script que permite fechar ao clicar novamente -->
  <script src="/Projeto_ECommerce/web/public/js/baixo.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/Projeto_ECommerce/web/public/js/java.js"></script>
</body>

</html>