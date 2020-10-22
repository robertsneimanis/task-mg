<nav class="navbar navbar-expand navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?= URLROOT; ?>"><?= SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome <?= $_SESSION['user_name']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/users/logout">Logout</a>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/users/index">Login/Register</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
