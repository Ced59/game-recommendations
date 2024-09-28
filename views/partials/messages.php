<?php

$error = $error ?? ($_SESSION['error'] ?? null);
$success = $success ?? ($_SESSION['success'] ?? null);

if (!empty($error)): ?>
    <div class="alert alert-danger mt-3" role="alert">
        <?= $error ?>
    </div>
    <?php

    unset($_SESSION['error']);
    ?>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-info mt-3" role="alert">
        <?= $success ?>
    </div>
    <?php

    unset($_SESSION['success']);
    ?>
<?php endif; ?>
