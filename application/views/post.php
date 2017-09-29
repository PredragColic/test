<?php include('inc/header.php'); ?>

<h2>
    <?= $post['title'] ?>
</h2>
<small>
    <?= date('M d, Y', strtotime($post['created_at'])) ?> by 
    <strong><?= $post['name'] ?></strong> in 
    <a href="<?= base_url('category/' . $post['category_id']) ?>"><?= $post['naziv'] ?></a>
</small>

<p><?= $post['body'] ?></p>

<?php if(!empty($comments)): ?>
    <h3>Comments</h3>

    <?php foreach($comments as $comment) : ?>
    <p><b><?= $comment['name'] ?></b></p>
    <p id="commentPost<?= $comment['id'] ?>"><?= $comment['comment'] ?></p>

        <?php if($comment['user_id'] == $this->session->userdata('user_id')): ?>
        <p>
        <div class="text-right">
            <button class="btn btn-sm btn-default editComment" data-url="<?= base_url('comments/edit/') ?>" data-id="<?= $comment['id'] ?>">Edit</button>
            <button class="btn btn-sm btn-danger deleteComment" data-url="<?= base_url('comments/delete/') ?>" data-id="<?= $comment['id'] ?>">Delete</button>
        </div>
        </p>
        <?php endif; ?>
    <hr>
    <?php endforeach; ?> 
<?php endif; ?>
    
<button class="btn comment" id="comment">Add Comment</button>
<div class="addComment">
    <?php if (!empty($this->session->userdata('user_id'))): ?>

    <!--<form class="form-horizontal" action='<?php //echo base_url('comments/postComment'); ?>' method="POST" >
        <input type="hidden" name="user_id" value="<?php //echo $this->session->userdata('user_id') ?>">
        <input type="hidden" name="post_id" value="<?php //echo $this->uri->segment(2) ?>">
        <input type="hidden" name="name" value="<?php //echo $this->session->userdata('username') ?>"> -->
        <div class="form-group">
            <div class="col-md-5">
                <textarea class="form-control" id="inputComment" name="comment" placeholder="Add your comments"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5">
                <button class="btn btn-primary postComment" id="postComment" data-id="<?=$post['id']?>" data-url="<?=  base_url('comments/postComment')?>">Send Comment</button>
            </div>
        </div>
    </form>

    <?php endif; ?>
</div>

<?php include('inc/footer.php'); ?> 