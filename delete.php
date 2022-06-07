<?php
require_once "classes/conn.php";
require_once "classes/user.php";
require_once "classes/request.php";


$obb=new request();
if($obb->getHas('id'))
{
    $id=$obb->get('id');

    $ob=new user();
    
    $ob->selectImg($id);

    $Datas=$ob->delete($id);

    header("location:index.php");

}



?>