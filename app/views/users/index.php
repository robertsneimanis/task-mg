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

<?php require APPROOT . '/views/inc/footer.php'; ?>