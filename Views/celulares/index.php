<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celulares</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #0f0f0f;
            color: #f0f0f0;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        h1 { font-size: 24px; color: #ffffff; }

        .btn {
            padding: 10px 20px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn:hover { background-color: #574fd6; }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1a1a1a;
            border-radius: 12px;
            overflow: hidden;
        }

        thead {
            background-color: #252525;
        }

        th {
            padding: 14px 16px;
            text-align: left;
            font-size: 13px;
            color: #6c63ff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 12px 16px;
            font-size: 14px;
            color: #ccc;
            border-top: 1px solid #2a2a2a;
        }

        tr:hover td { background-color: #212121; }

        .badge {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-yes { background-color: #1a3a2a; color: #4caf84; }
        .badge-no { background-color: #3a1a1a; color: #f44336; }

        .empty {
            text-align: center;
            padding: 60px;
            color: #555;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📱 Lista de Celulares</h1>
        <a href="?route=celular.create" class="btn">+ Agregar Celular</a>
        <a href="?route=user.logout" class="btn" style="background-color:#f44336; margin-left:10px;">Cerrar Sesión</a>
        <a href="?route=user.index" class="btn" style="margin-left:10px; background-color:#333;">👥 Usuarios</a>

    </div>

    <?php if (empty($celulares)): ?>
        <div class="empty">No hay celulares registrados aún.</div>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>IMEI</th>
                <th>Pulgadas</th>
                <th>RAM</th>
                <th>SO</th>
                <th>Banda</th>
                <th>WiFi</th>
                <th>NFC</th>
                <th>Huella</th>
                <th>SIM</th>
            </tr>
        </thead>
       <?php foreach ($celulares as $celular): ?>
<tr>
    <td><?= htmlspecialchars($celular->id) ?></td>
    <td><?= htmlspecialchars($celular->marca) ?></td>
    <td><?= htmlspecialchars($celular->imei) ?></td>
    <td><?= htmlspecialchars($celular->pulgadas) ?>"</td>
    <td><?= htmlspecialchars($celular->ram) ?> GB</td>
    <td><?= htmlspecialchars($celular->sistemaOperativo) ?></td>
    <td><?= htmlspecialchars($celular->tecnologiaBanda) ?></td>
    <td><span class="badge <?= $celular->wifi ? 'badge-yes' : 'badge-no' ?>"><?= $celular->wifi ? 'Sí' : 'No' ?></span></td>
    <td><span class="badge <?= $celular->nfc ? 'badge-yes' : 'badge-no' ?>"><?= $celular->nfc ? 'Sí' : 'No' ?></span></td>
    <td><span class="badge <?= $celular->huella ? 'badge-yes' : 'badge-no' ?>"><?= $celular->huella ? 'Sí' : 'No' ?></span></td>
    <td><?= htmlspecialchars($celular->cantidadSim) ?></td>
</tr>
<td>
    <a href="?route=celular.delete&id=<?= $celular->id ?>" 
    onclick="return confirm('¿Seguro que deseas eliminar este celular?')"
    style="color:#f44336; text-decoration:none; font-size:13px;">Eliminar</a>
</td>
<?php endforeach; ?>
    </table>
    <?php endif; ?>
</body>
</html>