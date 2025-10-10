<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CareerLab - Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f7fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }
    .btn-careerlab {
      background: linear-gradient(90deg, #4e73df, #1cc88a);
      border: none;
      color: white;
    }
    .btn-careerlab:hover {
      opacity: 0.9;
    }
    .form-label {
      font-weight: 600;
      color: #444;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">CareerLab</a>      
    </div>
  </nav>

  <!-- Conteúdo -->
  <main class="flex-grow-1 d-flex justify-content-center align-items-center">
    <div class="card w-75 p-4">
      <h2 class="text-center mb-4">Crie sua conta</h2>
      <form action="cadastra-usuario.php" method="post" enctype="multipart/form-data" class="row g-3">

        <!-- Foto -->
        <div class="col-md-12 text-center">
          <label for="foto" class="form-label">Foto de Perfil</label>
          <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
        </div>

        <!-- Email -->
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
        </div>

        <!-- Senha -->
        <div class="col-md-6">
          <label class="form-label">Senha</label>
          <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
        </div>

        <!-- Nome -->
        <div class="col-md-6">
          <label class="form-label">Nome de Usuário</label>
          <input type="text" class="form-control" name="nome" placeholder="Seu nome" required>
        </div>

        <!-- Data de nascimento -->
        <div class="col-md-6">
          <label class="form-label">Data de Nascimento</label>
          <input type="date" class="form-control" name="data_nascimento" required>
        </div>

        <!-- Telefone -->
        <div class="col-md-6">
          <label class="form-label">Telefone</label>
          <input type="tel" class="form-control" name="telefone" placeholder="(xx) xxxxx-xxxx" required>
        </div>

        <!-- Área de Especialização -->
        <div class="col-md-6">
          <label class="form-label">Área de Especialização</label>
          <select class="form-select" name="area_id" required>
            <option value="">Selecione...</option>
            <?php
              require "src/ConexaoBD.php";
              $conexao = ConexaoBD::conectar();
              $stmt = $conexao->query("SELECT id, nome FROM areas ORDER BY nome");
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
              }
            ?>
          </select>
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="btn btn-careerlab btn-lg mt-3 px-5">Cadastrar</button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 - CareerLab. Todos os direitos reservados.</p>
  </footer>

</body>
</html>
