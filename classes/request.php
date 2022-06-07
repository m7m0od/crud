<?php
class request
{
    public function get($key)
    {
        return $_GET[$key];
    }
    public function post($key)
    {
        return $_POST[$key];
    }

    public function getHas($key)
    {
        return isset($_GET[$key]);
    }

    public function postHas($key)
    {
        return isset($_POST[$key]);
    }

    public function postclean($key)
    {
        return trim(htmlspecialchars($_POST[$key]));
    }

}

/*

require_once "this file";

$ob=new request();  
$ob->any method;

if($ob->getHas('id')){echo $ob->get("id");}         ==   if(isset($_GET['id])){ echo $_GET['id'];}
   


*/






?>