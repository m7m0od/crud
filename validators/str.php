<?php

class str implements validationrole
{
    public function check($name,$value)
    {
        if(is_numeric($value))
        {
            return "$name must be string";
        }
        return false;
    }
}




?>