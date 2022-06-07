<?php

class Db
{
    public $conn;
    public $table;

    public function connect()
    {
        $this->conn=mysqli_connect("localhost","root","","posts");
        if(!$this->conn)
        {
            die("error");
        }
    }

    public function selectAll(string $fileds="*"):array
    {
        $sql="SELECT $fileds FROM $this->table ";
        $result=mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function selectUP($id,string $fileds="*")
    {
        $sql="SELECT $fileds FROM $this->table WHERE id = $id ";
        $result=mysqli_query($this->conn,$sql);
        return mysqli_fetch_assoc($result);
    }
    public function selectID($id,string $fileds="*")
    {
        $sql="SELECT $fileds FROM $this->table WHERE id = $id ";
        $result=mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function selectWhere($cond,string $fileds="*"):array
    {
        $sql="SELECT $fileds FROM $this->table WHERE $cond ";
        $result=mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function insert($fileds,$value)
    {
        $sql="INSERT INTO $this->table ($fileds) VALUES ($value)";
        return mysqli_query($this->conn,$sql);
    }

    public function update($fileds,$id)
    {
        $sql="UPDATE $this->table SET $fileds WHERE id = $id";
        return mysqli_query($this->conn,$sql);
    }

    public function delete($id)
    {
        $sql="DELETE FROM $this->table WHERE id = $id";
        return mysqli_query($this->conn,$sql);
    }

    public function selectImg($id)
    {
        $sql="SELECT img FROM $this->table WHERE id = $id ";
        $result=mysqli_query($this->conn,$sql);
        $img=mysqli_fetch_all($result,MYSQLI_ASSOC);
        $imgName=$img['img'];
        unlink("uploads/$imgName");
    }
}







?>