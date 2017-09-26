<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Blog Test2</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url()?>">Home</a></li>

          </ul>

          <ul class="nav navbar-nav pull-right">
            <?php if( !empty($_SESSION['user_id']) ):?>
              <li><a href="<?php echo base_url('posts')?>">Posts</a></li>
              <li><a href="<?php echo base_url('categories')?>">Categories</a></li>
              <li><a href="<?php echo base_url('/logout')?>">Logout</a></li>
            <?php else: ?>
              <li><a href="<?php echo base_url('/registration')?>">Registration</a></li>
              <li><a href="<?php echo base_url('/login')?>">Login</a></li>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav>
