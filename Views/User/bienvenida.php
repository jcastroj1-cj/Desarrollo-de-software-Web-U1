<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background-color: #0f0f0f;
            color: #f0f0f0;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.5);
        }
        h1 { font-size: 24px; margin-bottom: 16px; color: #ffffff; }
        p { color: #888; font-size: 14px; margin-bottom: 28px; }
        a {
            color: #6c63ff;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover { text-decoration: underline; }
        .flash-success {
            background-color: #1a3a2a;
            color: #4caf84;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .flash-error {
            background-color: #3a1a1a;
            color: #f44336;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
       <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
    <div class="flash-success">
        ✅ Usuario registrado correctamente.
    </div>
<?php endif; ?>
            </div>
       

        <h1>✅ Cuenta creada</h1>
        <p>Tu cuenta fue registrada exitosamente.<br>Ya puedes iniciar sesión.</p>
        <a href="?route=user.loginForm">← Ir al login</a>
    </div>
</body>
</html>