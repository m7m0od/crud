<?php 

class Session{
    public function __construct()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function set($key,$value)
    {
        $_SESSION[$key][]=$value;
    }

    public function getAll()
    {
        return $_SESSION;
    }

    public function getKey($key)
    {
        return $_SESSION[$key];
    }

    public function isSession($key)
    {
        return isset($_SESSION[$key]);
    }


    public function unsetKey($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroyAll()
    {
        $_SESSION=[];
        session_destroy();
    }
}

/*

require_once "this file";

$ob=new Session();  and in any where you want to do session start
$ob->any method;



*/

?>
