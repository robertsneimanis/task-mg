<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Posts</h1>
  </div>
  <div class="col-md-6">
    <a href="<?= URLROOT; ?>/posts/add" class="btn btn-primary pull-right">Add Attribute</a>
  </div>
</div>

<table style="width:50%">
  <tr>
    <th>Attribute</th>
    <th>value</th>
    <th></th>
  </tr>
  <?php foreach($data['posts'] as $post) : ?>
    <tr>
      <td><?= $post->title; ?></td>
      <td><?= $post->body; ?></td>
      <td>
        <a href="<?= URLROOT; ?>/posts/edit/<?= $post->id; ?>" class="btn btn-dark">Edit</a>
        <form class="pull-right" action="<?= URLROOT; ?>/posts/delete/<?= $post->id; ?>" method="post">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>