<?php include('inc/header.php'); ?>
<div class="jumbotron">
    <h1>Welcome to Blog</h1>
    <p class="lead">This is test2</p>
</div>
<?php if(!empty($posts)):?>
    <?php foreach ($posts as $post): ?>
        <h2>
            <a href="<?=  base_url('read/'.$post['id'])?>"><?= $post['title'] ?></a>
        </h2>
        <small><?= date('M d, Y', strtotime($post['created_at'])) ?> by <strong><?= $post['name'] ?></strong> in <a href="<?=base_url('category/'.$post['category_id'])?>"><?= $post['naziv'] ?></a></small>
        <p><?= $post['body'] ?></p>
        <hr>
    <?php endforeach; ?>
<?php else:?>
    <p>We dont have posts</p>
<?php endif;?>

<?php include('inc/footer.php'); ?>
