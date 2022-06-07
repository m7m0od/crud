<?php
require_once "classes/session.php";
$session=new Session();

require_once "inc/header.php";
require_once "classes/conn.php";
require_once "classes/user.php";
require_once "classes/request.php";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $ConnOb=new user();
    $post=$ConnOb->selectUP($id);

}

$Req=new request();
if($Req->getHas('id'))
{
    $id=$Req->get('id');
    $ConnOb=new user();
    $post=$ConnOb->selectUP($id);
}
?>
<?php if($session->isSession('errors')) { ?>
    <div class="alert alert-danger w-25">
        <?php foreach($session->getKey('errors') as $error){ ?>
            <P><?php echo $error ?> </p>
    <?php } $session->unsetKey('errors'); ?> 
    </div>
    <?php } ?>



<div class="container">
    <form action="handles/updateHandle.php?id=<?php echo $post['id']?>" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="form-group w-25 col-md-4">
                <label>Product id:</label>
                <input value=<?php echo $post['id'] ?>   type="number" name="id" class="form-control">
            </div>
            <div class="form-group w-25 col-md-4">
                <label>Product Name:</label>
                <input value=<?php echo $post['name'] ?> type="text" name="name" class="form-control">
            </div>
            <div class="form-group w-25 col-md-4">
                <label>Product salary:</label>
                <input value=<?php echo $post['salary'] ?>  type="number" name="salary" class="form-control">
            </div>
        </div>
            <div class="form-group">
                <label>Product Desc:</label>
                <textarea  name="desc" class="form-control"><?php echo $post['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Product img:</label>
                <input type="file" name="img" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-info mt-3 float-right">Update</button>
            <div class="clr"></div>
    </form>
</div>




<?php
require_once "inc/footer.php";
?>
