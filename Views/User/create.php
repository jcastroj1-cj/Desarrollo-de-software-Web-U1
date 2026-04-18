<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
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
            box-shadow: 0 8px 32px rgba(0,0,0,0.5);
        }
        h1 { font-size: 24px; margin-bottom: 8px; color: #ffffff; }
        p.subtitle { color: #888; font-size: 14px; margin-bottom: 28px; }
        label { display: block; font-size: 13px; color: #aaa; margin-bottom: 6px; }
        input, select {
            width: 100%;
            padding: 12px 14px;
            background-color: #252525;
            border: 1px solid #333;
            border-radius: 8px;
            color: #f0f0f0;
            font-size: 14px;
            margin-bottom: 18px;
            outline: none;
            transition: border 0.2s;
        }
        input:focus, select:focus { border-color: #6c63ff; }
        button {
            width: 100%;
            padding: 12px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover { background-color: #574fd6; }
        .back { text-align: center; margin-top: 16px; font-size: 13px; color: #888; }
        .back a { color: #6c63ff; text-decoration: none; }
        .back a:hover { text-decoration: underline; }
        #campo-codigo { display: none; }
    </style>
</head>
<body>
    <div class="card">
        <h1>👤 Registrar Usuario</h1>
        <p class="subtitle">Completa los datos del nuevo usuario</p>

        <form method="POST" action="?route=user.store">
            <label>ID</label>
            <input name="id" type="number" placeholder="123">

            <label>Nombre</label>
            <input name="nombre" type="text" placeholder="Juan Pérez">

            <label>Contraseña</label>
            <input name="clave" type="password" placeholder="••••••••">

            <label>Rol</label>
            <select name="rol" id="select-rol" onchange="toggleCodigo()">
                <option value="usuario">Usuario</option>
                <option value="admin">Administrador</option>
            </select>

            <div id="campo-codigo">
                <label>Código de administrador</label>
                <input name="codigo_admin" type="password" placeholder="Código secreto">
            </div>

            <button type="submit">Registrarse</button>
        </form>

        <div class="back">
            <a href="?route=user.loginForm">← Volver al login</a>
        </div>
    </div>

    <script>
        function toggleCodigo() {
            const rol = document.getElementById('select-rol').value;
            const campo = document.getElementById('campo-codigo');
            campo.style.display = rol === 'admin' ? 'block' : 'none';
        }
    </script>
</body>
</html>