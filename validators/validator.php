<?php
class validator
{
    private $errors=[];

    public function validate($name,$value,$arr)
    {
        foreach($arr as $ar)
        {
            $ob=new $ar;

            $err=$ob->check($name,$value);
            if($err !=false)
            {
                $this->errors[]=$err;
            }
        }
    }

    public function geterrors()
    {
        return $this->errors;
    }

    public function checkerrors()
    {
        return empty($this->errors);
    }

}


?>