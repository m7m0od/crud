<?php

class user extends Db {
    public function __construct()
    {
        $this->table="postData";
        $this->connect();
    }

}







?>