<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CareerLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .login-card {
            max-width: 420px;
            width: 100%;
            border: none;
            border-radius: 1rem;
            padding: 2rem;
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .btn-careerlab {
            background: linear-gradient(90deg, #4e73df, #1cc88a);
            border: none;
            color: white;
            font-weight: 500;
            transition: 0.3s ease-in-out;
        }

        .btn-careerlab:hover {
            opacity: 0.9;
            transform: scale(1.02);
        }

        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">CareerLab</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="flex-grow-1 d-flex align-items-center justify-content-center">
        <form action="efetua-login.php" method="post" class="login-card">
            <h3 class="text-center mb-4 fw-bold text-dark">Login</h3>
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="alert alert-info text-center" role="alert">';
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                echo '</div>';
            } else {
                echo '<div class="alert alert-info text-center" role="alert">';
                echo 'Informe seu email e senha para entrar.';
                echo '</div>';
            }
            ?>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-careerlab w-100 py-2">Entrar</button>

            <div class="text-center mt-3">
                <a href="form-cadastra-usuario.php" class="text-decoration-none">Ainda não sou usuário</a>
            </div>
        </form>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; 2025 CareerLab - Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
