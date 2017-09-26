<?php include('inc/header.php'); ?>
<div class="jumbotron">
    <h1>Welcome to Blog</h1>
    <p class="lead">This is test2</p>
</div>
<?php if (isset($msg)): ?>
    <div class="alert alert-success" role="alert"><?php echo $msg; ?></div>
<?php endif; ?>
<?php foreach ($posts as $post): ?>
    <h2><?= $post['title'] ?></h2>
    <small><?= date('M d, Y', strtotime($post['created_at'])) ?> by <strong><?= $post['name'] ?></strong> in <?= $post['naziv'] ?></small>
    <p><?= $post['body'] ?></p>
    <hr>
<?php endforeach; ?>


<?php include('inc/footer.php'); ?>
