<?php
require_once "inc/header.php";
require_once "classes/session.php";
$session=new Session();
?>

    <?php if($session->isSession('errors')) { ?>
    <div class="alert alert-danger w-25">
    <?php foreach(($session->getKey('errors')) as $error){ ?>
            <P><?php print_r($error) ?> </p>
    <?php } $session->unsetKey('errors'); ?> 
    </div>
    <?php } ?> 


<div class="container">
    <form action="handles/addHandle.php" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="form-group w-25 col-md-4">
                <label>Product id:</label>
                <input type="number" name="id" class="form-control">
            </div>
            <div class="form-group w-25 col-md-4">
                <label>Product Name:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group w-25 col-md-4">
                <label>Product salary:</label>
                <input type="number" name="salary" class="form-control">
            </div>
        </div>
            <div class="form-group">
                <label>Product Desc:</label>
                <textarea  name="desc" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Product img:</label>
                <input type="file" name="img" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-info mt-3 float-right">Add Product</button>
            <div class="clr"></div>
    </form>
</div>




<?php
require_once "inc/footer.php";
?>
