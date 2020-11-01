<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="attribute-bg">
  <?php flash('attribute_message'); ?>

  <div class="page-container">
    <div class="header">
      <ul>
        <li>
          Welcome <?= $_SESSION['user_name']; ?>
        </li>
        <li class="logout">
          <a href="<?= URLROOT; ?>/users/logout">Logout</a>
        </li>
      </ul>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <h1>Attributes</h1>
      </div>
      <div class="col-6">
        <a href="<?= URLROOT; ?>/attributes/add" class="main-button">Add Attribute</a>
      </div>
    </div>

    <table style="width:100%">
      <tr>
        <th>Attribute</th>
        <th>value</th>
        <th>Action</th>
      </tr>
      <?php foreach($data['attributes'] as $attribute) : ?>
      <tr>
        <td><?= $attribute->attribute; ?></td>
        <td><?= $attribute->value; ?></td>
        <td>
          <a href="<?= URLROOT; ?>/attributes/edit/<?= $attribute->id; ?>" class="main-button form-button">Edit</a>
          <form class='delete-article' action="<?= URLROOT; ?>/attributes/delete/<?= $attribute->id; ?>" method="post">
            <input type="submit" value="Delete" class="main-button form-button">
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>