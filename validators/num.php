<?php

class num implements validationrole
{
    public function check($name,$value)
    {
        if(! is_numeric($value))
        {
            return "$name must be number";
        }
        return false;
    }
}




?>