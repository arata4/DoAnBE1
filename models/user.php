<?php
class User extends DB
{
    public function getUserByID($user,$pass){
        $sql = self::$connection->prepare( "SELECT * FROM `user` WHERE user like ? and pass like ?");
        $sql->bind_param("ss", $user,$pass);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM `user` ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function deleteUser($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `user` WHERE id=?");
        $sql->bind_param("i",$id);
       return $sql->execute();
    }
    public function editUser($user,$role,$id)
    {
        $sql = self::$connection->prepare("UPDATE `user` SET `user`=?, `role`=? WHERE `id`=?");
        $sql->bind_param("ssi",$user,$role,$id);
        return $sql->execute();
    }
    public function getUserFromID($id){
        $sql = self::$connection->prepare( "SELECT * FROM `user` WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function insertUser($user,$pass)
    {
        $sql = self::$connection->prepare("INSERT INTO `user`(`user`,`pass`) VALUES(?,?)");
        $sql->bind_param("ss",$user,$pass);
        return $sql->execute();
    }
    public function checkUserInDatabase($user,$pass)
    {
        $sql = self::$connection->prepare("SELECT * FROM member WHERE username = '$user'");
        $sql->bind_param("s", $user);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
