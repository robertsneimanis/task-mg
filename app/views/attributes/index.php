<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('attribute_message'); ?>
<div class="row mb-3">
  <div class="col-6">
    <h1>Attributes</h1>
  </div>
  <div class="col-6">
    <a href="<?= URLROOT; ?>/attributes/add" class="btn btn-primary pull-right">Add Attribute</a>
  </div>
</div>

<table style="width:100%">
  <tr>
    <th>Attribute</th>
    <th>value</th>
    <th></th>
  </tr>
  <?php foreach($data['attributes'] as $attribute) : ?>
    <tr>
      <td><?= $attribute->title; ?></td>
      <td><?= $attribute->body; ?></td>
      <td>
        <a href="<?= URLROOT; ?>/attributes/edit/<?= $attribute->id; ?>" class="btn btn-dark">Edit</a>
        <form class="pull-right" action="<?= URLROOT; ?>/attributes/delete/<?= $attribute->id; ?>" method="post">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>