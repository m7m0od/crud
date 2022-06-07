<?php
require_once "classes/conn.php";
require_once "classes/user.php";
require_once "classes/request.php";

$obb=new request();
if($obb->getHas('id'))
{
    $id=$obb->get('id');


    $ob=new user();
    $Datas=$ob->selectID($id);
}

?>


<?php
require_once "inc/header.php";
?>

    <div class="container">
        <div class="row">
            <?php foreach($Datas as $Data){ ?>
            <div class="col-md-4">
                <img class="img-fluid" src="uploads/<?php echo $Data['img'] ?>">
                <h1><?php echo $Data['name'] ?><span class="m-1 btn-info float-right"><?php echo $Data['salary'] ?></span> </h1>
                <p><?php echo $Data['description'] ?> </p>
            </div>
            <?php } ?>
        </div>
    </div>
   
<?php
require_once "inc/footer.php";
?>