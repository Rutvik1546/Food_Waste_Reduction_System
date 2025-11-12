<?php
require_once __DIR__ . '/../../../core/Connection.php';
require_once __DIR__ . '/../../../common/Utility.php';
if (!isset($_SESSION)) {
    session_start();
}

$id = $_GET['id'] ?? null;
$role = $_SESSION['role'] ?? null;
$name = $_SESSION['name'] ?? null;
$email = $_SESSION['email'] ?? null;

$db = new Connection();
$conn = $db->getConnection();

if (!$id) {
    Utility::setFlashMessage('error_message','Invalid item ID!');
    Utility::getFlashMessage('error_message');
}

if ($role === 'receiver') {
    $status = 'Taken';
    $updateAdmin = $conn->prepare("
        UPDATE food_items_admin 
        SET receiver_name = ?, receiver_email = ?, status = ? 
        WHERE id = ?
    ");
    $updateAdmin->bind_param("sssi", $name, $email, $status, $id);
    $updateAdmin->execute();
    $deleteFood = $conn->prepare("DELETE FROM food_items WHERE id = ?");
    $deleteFood->bind_param("i", $id);

    if ($deleteFood->execute()) {
        Utility::setFlashMessage('success_message','Item taken successfully!');
        Utility::getFlashMessage('success_message','index.php?controller=item&action=displayDonate');
    } else {
        Utility::setFlashMessage('error_message','Failed to take item!');
        Utility::getFlashMessage("error_message");
    }

    $updateAdmin->close();
    $deleteFood->close();

} elseif ($role === 'admin') {
    $deleteFood = $conn->prepare("DELETE FROM food_items WHERE id = ?");
    $deleteFood->bind_param("i", $id);
    $deleteAdmin = $conn->prepare("DELETE FROM food_items_admin WHERE id = ?");
    $deleteAdmin->bind_param("i", $id);

    $ok1 = $deleteFood->execute();
    $ok2 = $deleteAdmin->execute();

    if ($ok1 || $ok2) {
        Utility::setFlashMessage('success_message','Item deleted successfully!');
        Utility::getFlashMessage('success_message','index.php?controller=item&action=displayDonate');
    } else {
        Utility::setFlashMessage('error_message','Failed to delete item!');
        Utility::getFlashMessage('error_message');
    }

    $deleteFood->close();
    $deleteAdmin->close();
} else {
    Utility::setFlashMessage('error_message','Unauthorized access!');
    Utility::getFlashMessage('error_message');
}
?>

