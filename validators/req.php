<?php

class req implements validationrole
{
    public function check($name,$value)
    {
        if(empty($value))
        {
            return "$name is requierd";
        }
        return false;
    }
}




?>