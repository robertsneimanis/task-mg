<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?= URLROOT; ?>/attributes" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Edit attribute</h2>
    <p>Create a attribute with this form</p>
    <form action="<?= URLROOT; ?>/attributes/edit/<?= $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="title">Attribute: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['title']; ?>">
        <span class="invalid-feedback"><?= $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Value: <sup>*</sup></label>
        <textarea name="body" class="form-control form-control-lg <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?= $data['body']; ?></textarea>
        <span class="invalid-feedback"><?= $data['body_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>