<?php include('inc/header.php'); ?>
<h1>Post Listing </h1>
<p class="text-right">
    <a class="btn btn-primary btn-lg" href="<?php echo base_url('posts/add');?>">Add new</a>
</p>
<?php if(!empty($posts)):?>
    <?php foreach($posts as $post):?>
        <h2><?=$post['title']?></h2>
        <small><?=date('M d, Y',strtotime($post['created_at']))?> by <strong><?=$post['name']?></strong> in <a href="<?=base_url('category/'.$post['category_id'])?>"><?=$post['naziv']?></a></small>
        <p><?=$post['body']?></p>
        <?php if($post['user_id'] == $this->session->userdata('user_id')):?>
        <a class="btn btn-info" href="<?=  base_url('posts/edit/'.$post['id'])?>">Edit</a>
        <button class="btn btn-danger deletePost" data-url="<?=  base_url('posts/delete/')?>" data-id="<?=$post['id']?>">Delete</button>
        <?php endif;?>
    <hr>
    <?php endforeach;?>
<?php else:?>
    <p>We dont have posts</p>
<?php endif;?>
<?php include('inc/footer.php'); ?>
