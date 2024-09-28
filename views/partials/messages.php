<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-info"  
         role="alert">
        <?= $success ?>
    </div>
<?php endif; ?>
