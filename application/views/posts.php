<?php include('inc/header.php'); ?>
<h1>Post Listing </h1>
<p class="text-right">
    <a class="btn btn-primary btn-lg" href="<?php echo base_url('posts/add');?>">Add new</a>
</p>
<?php foreach($posts as $post):?>
<h2><?=$post['title']?></h2>
<small><?=date('M d, Y',strtotime($post['created_at']))?> by <strong><?=$post['name']?></strong> in <?=$post['naziv']?></small>
<p><?=$post['body']?></p>
<hr>
<?php endforeach;?>
<?php include('inc/footer.php'); ?>
