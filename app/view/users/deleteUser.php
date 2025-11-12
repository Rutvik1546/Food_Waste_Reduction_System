<?php
require_once __DIR__.'/../../../core/Connection.php';

$id = $_GET['id'];
$db = new Connection();
$conn = $db->getConnection();

$sql = $conn->prepare("DELETE from users where id = ?");
$sql->bind_param("i",$id);
if($sql->execute()) {
    Utility::setFlashMessage('success_message','Data deleted successfully!');
    Utility::getFlashMessage('success_message','index.php?controller=auth&action=displayUser');
} else {
    Utility::setFlashMessage('error_message','Failed to delete data!');
    Utility::getFlashMessage('error_message');
}

?>
