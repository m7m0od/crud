<?php

require_once "classes/conn.php";
require_once "classes/user.php";

$ob=new user();
$Datas=$ob->selectAll();

?>

<?php
require_once "inc/header.php";
?>
    <div class="container">
        <h1 class="text-center">CRUD OPERATION</h1>
        <a class="float-right btn btn-info" href="addData.php">Add Data</a>
        <div style="clear:both"></div>
        <div class="row">
            <?php foreach($Datas as $Data){ ?>
            <div class="col-md-4">
                <h1><?php echo $Data['name'] ?> </h1>
                <a class="btn btn-info" href="seemore.php?id=<?php echo $Data['id'] ?>">see more</a>
                <a class="btn btn-info" href="update.php?id=<?php echo $Data['id'] ?>">update</a>
                <a class="btn btn-info" href="delete.php?id=<?php echo $Data['id'] ?>">delete</a>
            </div>
            <?php } ?>
        </div>
    </div>
   
<?php
require_once "inc/footer.php";
?>