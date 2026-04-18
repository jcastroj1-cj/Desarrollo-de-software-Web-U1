<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Usuario</title>
</head>
<body>
    <h1>Detalle de Usuario</h1>
    <?php if ($user): ?>
        <p><strong>ID:</strong> <?= htmlspecialchars($user['id']) ?></p>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($user['nombre']) ?></p>
        <p><strong>Rol:</strong> <?= htmlspecialchars($user['rol']) ?></p>
        <a href="?route=user.index">Volver</a>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
        <a href="?route=user.index">Volver</a>
    <?php endif; ?>
</body>
</html>