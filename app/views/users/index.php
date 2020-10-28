<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('register_success'); ?>

<form action="<?= URLROOT; ?>/users/index" method="post">
    <label for="email">Email: <sup>*</sup></label>
    <input type="email" name="email"
        class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
        value="<?= $data['email']; ?>">
    <span class="invalid-feedback"><?= $data['email_err']; ?></span>

    <label for="password">Password: <sup>*</sup></label>
    <input type="password" name="password"
        class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
        value="<?= $data['password']; ?>">
    <span class="invalid-feedback"><?= $data['password_err']; ?></span>

    <button type="submit" name="login" class="main-button form-button">Login</button>
</form>

<form action="<?= URLROOT; ?>/users/index" method="post">
    <label for="name">Name: <sup>*</sup></label>
    <input type="text" name="register-name"
        class="form-control form-control-lg <?= (!empty($data['register-name_err'])) ? 'is-invalid' : ''; ?>"
        value="<?= $data['register-name']; ?>">
    <span class="invalid-feedback"><?= $data['register-name_err']; ?></span>

    <label for="email">Email: <sup>*</sup></label>
    <input type="email" name="register-email"
        class="form-control form-control-lg <?= (!empty($data['register-email_err'])) ? 'is-invalid' : ''; ?>"
        value="<?= $data['register-email']; ?>">
    <span class="invalid-feedback"><?= $data['register-email_err']; ?></span>

    <label for="password">Password: <sup>*</sup></label>
    <input type="password" name="register-password"
        class="form-control form-control-lg <?= (!empty($data['register-password_err'])) ? 'is-invalid' : ''; ?>"
        value="<?= $data['register-password']; ?>">
    <span class="invalid-feedback"><?= $data['register-password_err']; ?></span>

    <button type="submit" name="register" class="main-button form-button">Register</button>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>