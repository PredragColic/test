<?php include('inc/header.php'); ?>
<h1>Edit Post</h1>

<p class="text-cener text-warning"><?php echo validation_errors(); ?></p>    
<div class="col-md-8 col-md-offset-2">
    <form class="form-horizontal" action='<?php echo base_url('posts/edit/'.$id); ?>' method="POST">
        
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        
        <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="inputNaziv" name="title" value="<?=$title?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputBody" class="col-sm-2 control-label">Body</label>
            <div class="col-md-10">
                <textarea class="form-control" id="inputBody" name="body"><?=$body?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategory" class="col-sm-2 control-label">Category</label>
            <div class="col-md-10">
                <select class="form-control" name="category_id">
                    <option value="0">Chose Category</option>
                    <?php foreach($categories as $cat): ?>
                        <option value="<?=$cat['id']?>" <?php if($cat['id']==$category_id) echo 'selected';?>> <?=$cat['naziv']?> </option>
                    <?php endforeach;?>
                </select>
                
            </div>
        </div>
        

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary btn-block">Send</button>
            </div>
        </div>
    </form>
</div>

<?php include('inc/footer.php'); ?>