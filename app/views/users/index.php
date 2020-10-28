<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('register_success'); ?>

<div class="content-wrapper">
    <div class="content-column">
        <h3>Don’t have an account?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.</p>
        <a href="#register-form" class="main-button show-register">Sign up</a>
    </div>

    <div class="content-column">
        <h3>Have an account?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <a href="#login-form" class="main-button show-login">Login</a>
    </div>

    <div class="form-container">
        <div class="side-bg"></div>
        <div id="login-form">
            <h3>Login</h3>
            <img class="logo" src="<?= URLROOT; ?>/public/images/logo.png">







            <form>
                <div class="form-group">
                    <input type="email" name="email">
                    <label for="email">
                        Email <sup>*</sup>
                        <img class='active' src="<?= URLROOT; ?>/public/images/mail.png">
                        <img class='not-active' src="<?= URLROOT; ?>/public/images/mail-active.png">
                    </label>
                </div>

                <div class="form-group">
                    <input type="password" name="password">
                    <label for="password">
                        Password <sup>*</sup>
                        <img class='active' src="<?= URLROOT; ?>/public/images/lock.png">
                        <img class='not-active' src="<?= URLROOT; ?>/public/images/lock-active.png">
                    </label>
                </div>

                <button type="submit" name="login" class="main-button form-button">Login</button>

                <a href="#" class="forgot-password">Forgot?</a>
            </form>



            <form action="<?= URLROOT; ?>/users/index" method="post">


                <div class="form-group">
                    <input type="email" name="email">
                    <label for="email">
                        Email <sup>*</sup>
                        <img class='active' src="<?= URLROOT; ?>/public/images/mail.png">
                        <img class='not-active' src="<?= URLROOT; ?>/public/images/mail-active.png">
                    </label>
                </div>



                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email"
                        class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>



                <div class="form-group">
                    <input type="email" name="email"
                        class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?= $data['email']; ?>">
                    <label for="email">
                        Email <sup>*</sup>
                        <img class='active' src="<?= URLROOT; ?>/public/images/mail.png">
                        <img class='not-active' src="<?= URLROOT; ?>/public/images/mail-active.png">
                    </label>
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>








                <label for="password">Password: <sup>*</sup></label>
                <input type="password" name="password"
                    class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?= $data['password']; ?>">
                <span class="invalid-feedback"><?= $data['password_err']; ?></span>

                <button type="submit" name="login" class="main-button form-button">Login</button>
            </form>











        </div>

        <div class="display-none" id="register-form">
            <h3>Sign up</h3>
            <img class="logo" src="<?= URLROOT; ?>/public/images/logo.png">
            <form>
                <div class="form-group">
                    <input type="text" name="register-name">
                    <label for="name">
                        Name: <sup>*</sup>
                        <img class='active' src="<?= URLROOT; ?>/public/images/user.png">
                        <img class='not-active' src="<?= URLROOT; ?>/public/images/user-active.png">
                    </label>
                </div>

                <div class="form-group">
                    <input type="email" name="register-email">
                    <label for="email">
                        Email: <sup>*</sup>
                        <img class='active' src="<?= URLROOT; ?>/public/images/mail.png">
                        <img class='not-active' src="<?= URLROOT; ?>/public/images/mail-active.png">
                    </label>
                </div>

                <div class="form-group">
                    <input type="password" name="register-password">
                    <label for="password">
                        Password: <sup>*</sup>
                        <img class='active' src="<?= URLROOT; ?>/public/images/lock.png">
                        <img class='not-active' src="<?= URLROOT; ?>/public/images/lock-active.png">
                    </label>
                </div>

                <button type="submit" name="register" class="main-button form-button">Register</button>
            </form>
        </div>
    </div>
</div>

<footer>All Rights Reserved “Magebit” 2016.</footer>

<?php require APPROOT . '/views/inc/footer.php'; ?>