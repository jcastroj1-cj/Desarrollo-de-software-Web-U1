<!DOCTYPE html>
<html>
<body>
    <h1>Usuarios</h1>
    <?php foreach ($users as $user): ?>
        <p><?= $user['nombre'] ?></p>
    <?php endforeach; ?>
</body>
</html>