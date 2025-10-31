<?php include "incs/valida-sessao.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>CareerLab</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f7fa;
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    .card {
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .usuario-bloco {
      background: #ffffff;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-careerlab {
      background: linear-gradient(90deg, #4e73df, #1cc88a);
      border: none;
      color: white;
    }

    .btn-careerlab:hover {
      opacity: 0.9;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">CareerLab</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="index.php">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <main class="container d-flex justify-content-center align-items-center my-5">
    <?php
      require_once "PostagemDAO.php";
      // obter o id do usuário a partir da sessão (ajuste a chave se necessário)
      $usuarioId = $_SESSION['id_usuario'] ?? null;
      $postagens = PostagemDAO::listarTimeline($usuarioId);
    
      

      // Mostrar todas as postagens
     
        ?>
          <div class="container">
            <div class="feed">
              <h2>Feed</h2>
              <div class="filters">
                <button>TI</button>
                <button>Marketing</button>
                <button>Design</button>
                <button>Outro</button>
              </div>
          <?php
            foreach ($postagens as $postagem) {
              ?>
              <div class="post">
               <img src= uploads/<?= $postagens['imagem'] ?> alt="Descrição da imagem">
                <div class="post-info">
                  <strong>Usuário Fulano</strong><br>
                </div>
              </div>
          <?php
             }
          ?>

            <div class="sidebar">
              <div class="card">
                <h3>Usuários</h3>
                <input type="text" placeholder="Buscar usuário" style="width:100%; padding:5px;">
                <p>Fernando de Noronha - <button>Seguir</button></p>
              </div>
              <div class="card">
                <h3>Ranking</h3>
                <ol>
                  <li>1º Name - 21 EXP</li>
                  <li>2º Name - 20 EXP</li>
                  <li>3º Name - 15 EXP</li>
                </ol>
              </div>
            </div>
          </div>
        <?php


    ?>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 - CareerLab. Todos os direitos reservados.</p>
  </footer>

</body>

</html>