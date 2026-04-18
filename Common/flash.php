<?php $flash = FlashMessage::get(); ?>
<?php if ($flash): ?>
    <div style="color: <?= $flash['type'] === 'success' ? 'green' : 'red' ?>">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>