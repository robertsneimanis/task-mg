<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="page-container">
  <a href="<?= URLROOT; ?>/attributes" class="main-button form-button"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Attribute</h2>
    <form action="<?= URLROOT; ?>/attributes/add" method="post">
      <div class="form-group">
        <label for="attribute">Attribute: <sup>*</sup></label>
        <input type="text" name="attribute"
          class="form-control form-control-lg <?= (!empty($data['attribute_err'])) ? 'is-invalid' : ''; ?>"
          value="<?= $data['attribute']; ?>">
      </div>
      <div class="form-group">
        <label for="value">Value: <sup>*</sup></label>
        <input type="text" name="value"
          class="form-control form-control-lg <?= (!empty($data['value_err'])) ? 'is-invalid' : ''; ?>"
          value="<?= $data['value']; ?>">
      </div>
      <input type="submit" class="main-button form-button" value="Submit">
    </form>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>