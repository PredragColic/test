<?php include('inc/header.php'); ?>

<h2>Registration</h2>
<div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" action='<?php echo base_url('pages/postRegistration'); ?>' method="POST">
        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword2" class="col-sm-2 control-label">Re-type Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword2" name="repassword" placeholder="Password">
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
