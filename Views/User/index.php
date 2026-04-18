<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover { background-color: #c62828; }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1a1a1a;
            border-radius: 12px;
            overflow: hidden;
        }

        thead { background-color: #252525; }

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

        .badge-admin { background-color: #1a2a3a; color: #6c63ff; }
        .badge-usuario { background-color: #2a2a2a; color: #aaa; }

        .flash-success {
            background-color: #1a3a2a;
            color: #4caf84;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .flash-error {
            background-color: #3a1a1a;
            color: #f44336;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

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
        <h1>👥 Lista de Usuarios</h1>
        <div>
            <a href="?route=user.create" class="btn">+ Crear Usuario</a>
            <a href="?route=celular.index" class="btn" style="margin-left:10px; background-color:#333;">📱 Celulares</a>
            <a href="?route=user.logout" class="btn btn-danger" style="margin-left:10px;">Cerrar Sesión</a>
        </div>
    </div>

    <?php $flash = FlashMessage::get(); ?>
    <?php if ($flash): ?>
        <div class="flash-<?= $flash['type'] ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <?php if (empty($users)): ?>
        <div class="empty">No hay usuarios registrados.</div>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user->id()->value()) ?></td>
                <td><?= htmlspecialchars($user->nombre()->value()) ?></td>
                <td>
                    <span class="badge badge-<?= $user->rol()->value() ?>">
                        <?= htmlspecialchars($user->rol()->value()) ?>
                    </span>
                </td>
                <td>
                    <?php if ($user->rol()->value() !== 'admin'): ?>
                        <a href="?route=user.promote&id=<?= $user->id()->value() ?>"
                           onclick="return confirm('¿Promover a admin?')"
                           style="color:#6c63ff; text-decoration:none; margin-right:12px;">
                           ⬆ Promover
                        </a>
                    <?php endif; ?>
                    <?php if ($user->id()->value() !== $_SESSION['user']['id']): ?>
                        <a href="?route=user.destroy&id=<?= $user->id()->value() ?>"
                           onclick="return confirm('¿Eliminar este usuario?')"
                           style="color:#f44336; text-decoration:none;">
                           🗑 Eliminar
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</body>
</html>