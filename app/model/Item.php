<?php
require_once __DIR__. '/../../core/Connection.php';

class Item {
    private $conn;
    private static $food_id = 40;
    public function __construct() {
        $db = new Connection();
        $this->conn = $db->getConnection(); 
    }

    public static function getFoodId() {
        return self::$food_id++;
    }

    public function getReceiverEmail() {
        $receiver_sql = $this->conn->prepare("SELECT email from users where role = 'receiver'");
        $receiver_sql->execute();
        return $receiver_sql->get_result();
    }


    public function addItem($name, $quantity, $address, $expire_date, $email) { 
        // $id++;
        $item_sql = $this->conn->prepare("INSERT into food_items(name,quantity,address,expire_date,email) values(?,?,?,?,?)");
        $item_sql->bind_param("sssss",$name, $quantity, $address, $expire_date, $email);
        return $item_sql->execute();
    }

    public function addItemAdmin($name, $quantity, $address, $expire_date, $email) {
        $user_sql = $this->conn->prepare("SELECT * from users where email=?");
        $user_sql->bind_param("s",$email);
        $user_sql->execute();
        $result = $user_sql->get_result();
        $row = $result->fetch_assoc();

        $item_sql = $this->conn->prepare("INSERT into food_items_admin(name,quantity,address,expire_date,donor_name,donor_email) values(?,?,?,?,?,?)");
        $item_sql->bind_param("ssssss",$name, $quantity, $address, $expire_date,$row['name'],$email);
        return $item_sql->execute();
    }
    public function updateItem($name, $quantity, $address, $expire_date, $id) {
        $item_sql = $this->conn->prepare("UPDATE food_items set name=?,quantity=?,address=?,expire_date=? where id = ?");
        $item_sql->bind_param("ssssi", $name, $quantity, $address, $expire_date, $id);
        return $item_sql->execute();
    }

    public function updateItemAdmin($name, $quantity, $address, $expire_date, $id) {
        $item_sql = $this->conn->prepare("UPDATE food_items_admin set name=?,quantity=?,address=?,expire_date=? where id = ?");
        $item_sql->bind_param("ssssi", $name, $quantity, $address, $expire_date, $id);
        return $item_sql->execute();
    }
}
?>
