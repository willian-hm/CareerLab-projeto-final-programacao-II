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
    require_once "src/UsuarioDAO.php";

    if (!isset($_GET['nome'])) {
      $_GET['nome'] = '';
    }

    $usuarios = UsuarioDAO::buscarUsuarioParaSeguir($_SESSION['idusuario'], $_GET['nome']);

    ?>

    <div class="card w-75 mx-auto p-4 text-center">

      <h2 class="mb-4">Bem-vindo(a), <?= $_SESSION['nome'] ?? $_SESSION['email']; ?>!</h2>
      <h4 class="mb-4">Explorar perfis</h4>

      <form class="" action="">
        <div class="row">
          <div class="col-10">
            <input type="text" name="nome" class="form-control mb-4 " placeholder="Buscar usuários por nome...">
          </div>
          <div class="col-2">
            <button type="submit" class="btn btn-careerlab mb-4">Buscar</button>
          </div>
        </div>

      </form>


      <?php foreach ($usuarios as $usuario): ?>
        <div class="usuario-bloco d-flex justify-content-between align-items-center">
          <span><?= $usuario['nome']; ?></span>
          <a href="seguir.php?idseguido=<?=$usuario['idusuario']?>" class="btn btn-careerlab">Seguir</a>
        </div>
      <?php endforeach; ?>

    </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 - CareerLab. Todos os direitos reservados.</p>
  </footer>

</body>

</html>