<?php
require_once __DIR__ . '/../../core/Connection.php';

Class User {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->getConnection();
    }

    public function getUserByEmail($email) {
        $user_sql = $this->conn->prepare("SELECT * FROM users where email=?");
        $user_sql->bind_param("s",$email);
        $user_sql->execute();
        return $user_sql->get_result();
    }

    public function registerUser($name,$email,$role,$password) {
        $register_sql = $this->conn->prepare("INSERT into users (name,email,role,password) values(?,?,?,?)");
        $register_sql->bind_param("ssss",$name,$email,$role,$password);
        return $register_sql->execute();
    }

    public function updateUser($name, $email, $role, $id) {
        $update_sql = $this->conn->prepare("UPDATE users set name=?,email=?,role=? where id=?");
        $update_sql->bind_param("sssi", $name, $email, $role, $id);
        return $update_sql->execute();
    }
}
?>

