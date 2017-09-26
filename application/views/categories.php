<?php include('inc/header.php'); ?>

<h2>Categories</h2>
<p class="text-right">
    <a class="btn btn-primary btn-lg" href="<?php echo base_url('categories/add'); ?>">Add new</a>
</p>
<table class="table table-condensed">
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <?php if (!empty($_SESSION['user_id'])): ?>
                <td>Action</td>
            <?php endif; ?>
        </tr>    
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['naziv'] ?></td>
                <?php if (!empty($_SESSION['user_id'])) : ?>
                    <td>
                        <a type="button" class="btn btn-info" href="<?php echo base_url('categories/edit/' . $category['id']) ?>">Edit</a>
                        <button id="deleteCat" class="btn btn-danger deleteCat" data-id="<?php echo $category['id'] ?>" data-url="<?=  base_url()?>">Delete</button>
                        <!--<a type="button" class="btn btn-danger" id="deleteCat" href="<?php //echo base_url('categories/delete/' . $category['id']) ?>">Delete</a>-->
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include('inc/footer.php'); ?>