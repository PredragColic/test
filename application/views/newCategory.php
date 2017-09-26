<?php include('inc/header.php'); ?>
<div class="page-header">
    <h1>Add new category</h1>             
</div>
<p class="text-cener text-warning"><?php echo validation_errors(); ?></p>    
<div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" action='<?php echo base_url('categories/add'); ?>' method="POST">
        <div class="form-group">
            <label for="inputNaziv" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNaziv" name="naziv" placeholder="category title">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-block">Send</button>
            </div>
        </div>
    </form>
</div>
<?php include('inc/footer.php'); ?>