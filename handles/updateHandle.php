<?php
require_once "../classes/conn.php";
require_once "../classes/user.php";
require_once "../classes/request.php";
require_once "../classes/session.php";
require_once "../validators/validationRole.php";
require_once "../validators/req.php";
require_once "../validators/str.php";
require_once "../validators/num.php";
require_once "../validators/validator.php";


$ob=new request();
if($ob->postHas('submit')&& $ob->getHas('id'))
{
    $id=$ob->post('id');
    $name=$ob->post('name');
    $salary=$ob->post('salary');
    $desc=$ob->post('desc');
    $image=$_FILES['img'];


    $imageName=$image['name'];
    $imageTmpName=$image['tmp_name'];
    $imageError=$image['error'];
    $imageSize=$image['size'];
    $imageSizeMB=$imageSize/(1024**2);
    $ext=pathinfo($imageName,PATHINFO_EXTENSION);

    $errors=[];
    
    $validator=new validator();
    $validator->validate("id",$id,['req','num']);
    $validator->validate("name",$name,['req','str']);
    $validator->validate("salary",$salary,['req','num']);
    $validator->validate("desc",$desc,['req','str']);
    if($imageError>0)
    {
        $errors[]="error while uploading";
    }else if(!in_array(strtolower($ext),['jpg','png','jpeg','gif'])){
        $errors[]="must be image";
    }else if($imageSizeMB>1)
    {
        $errors[]="image maxsize must be 1mb";
    }

    if($validator->checkerrors())
    {
        /*$randId=uniqid();
        $imgNewName="$randId.$ext";*/
        move_uploaded_file($imageTmpName,"../uploads/$imageName");

        $user=new user();
        $user->update("id=$id,name='$name',description='$desc',img='$imageName',salary=$salary",$id);
        header("location:../index.php");

    }else{
        $session=new Session();
        $session->set('errors',$errors);
        header("location:../addData.php");
    }
}

?>