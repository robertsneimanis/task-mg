<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('register_success'); ?>

<form action="<?php echo URLROOT; ?>/users/index" method="post">

    <label for="email">Email: <sup>*</sup></label>
    <input type="email" name="email"
        class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['email']; ?>">
    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>

    <label for="password">Password: <sup>*</sup></label>
    <input type="password" name="password"
        class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['password']; ?>">
    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>

    <button type="submit" name="login" class="btn btn-success btn-block">Login</button>

</form>

<form action="<?php echo URLROOT; ?>/users/index" method="post">
    <label for="name">Name: <sup>*</sup></label>
    <input type="text" name="register-name"
        class="form-control form-control-lg <?php echo (!empty($data['register-name_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['register-name']; ?>">
    <span class="invalid-feedback"><?php echo $data['register-name_err']; ?></span>

    <label for="email">Email: <sup>*</sup></label>
    <input type="email" name="register-email"
        class="form-control form-control-lg <?php echo (!empty($data['register-email_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['register-email']; ?>">
    <span class="invalid-feedback"><?php echo $data['register-email_err']; ?></span>

    <label for="password">Password: <sup>*</sup></label>
    <input type="password" name="register-password"
        class="form-control form-control-lg <?php echo (!empty($data['register-password_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['register-password']; ?>">
    <span class="invalid-feedback"><?php echo $data['register-password_err']; ?></span>

    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
    <input type="password" name="register-confirm_password"
        class="form-control form-control-lg <?php echo (!empty($data['register-confirm_password_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['register-confirm_password']; ?>">
    <span class="invalid-feedback"><?php echo $data['register-confirm_password_err']; ?></span>

    <button type="submit" name="register" class="btn btn-success btn-block">Register</button>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>