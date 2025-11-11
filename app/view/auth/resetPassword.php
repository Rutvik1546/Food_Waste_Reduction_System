<?php
include_once 'core/Connection.php';

$db = new Connection();
$conn = $db->getConnection();
$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ResetPassword'])) {
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if($new_password === $confirm_new_password) {
        $hashed_new_password = password_hash($new_password,PASSWORD_BCRYPT);
        $hashed_confirm_new_password = password_hash($confirm_new_password,PASSWORD_BCRYPT);

        $password_sql = $conn->prepare("UPDATE users set password=? where id=?");
        $password_sql->bind_param("si",$hashed_new_password,$id);
        if($password_sql->execute()){
            // $_SESSION['message'] = "Password Updated successfully!";
            Utility::setFlashMessage("success_message",'Password Updated successfully!');
            Utility::getFlashMessage('success_message','index.php?controller=auth&action=login');
            // header("Location:index.php?controller=auth&action=login");
            // exit;
        } else {
            // $_SESSION['message'] = "Failed to update password!";
            Utility::setFlashMessage('error_message','Failed to update Password!');
            Utility::getFlashMessage('error_message');
            // header("Location:index.php?controller=auth&action=reset");
            // exit;
        }
    } else {
        Utility::setFlashMessage('error_message','Password and Confirm password do not match!');
        Utility::getFlashMessage('error_message');
        // $_SESSION['message'] = "Password and Confirm password do not match!";
        // header("Location:resetPassword.php");
        // exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System- Reset Password Page</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #5db075, #3b8d99);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        background:#fff;
        padding: 40px 50px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        width : 100%;
        max-width : 440px;
        /* text-align: center; */
        
    }
    h1 {
        color: #333;
        margin-bottom: 25px;
        font-size : 26px;
    }

    label {
        display: block;
        color:#555;
        font-weight: 500;
        margin-bottom: 8px ;
    }

    input[type="password"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        outline:none;
        
    }

    input[type="password"]:focus {
        border-color: #00b09b;
        box-shadow: 0 0 5px rgba(0, 176, 155, 0.5);
    }

    input[type="submit"] {
        background: #00b09b;
        color: white;
        padding: 12px;
        width: 100%;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size:16px;
        font-weight: 600;
    }

    input[type="submit"]:hover {
        background: #019d89;
    }
</style>
<body>

    <form action="" method="post">
        <h1>Reset Your Password</h1>
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password" require><br/><br/>
        <label for="confirm_new_password">Confirm New Password</label>
        <input type="password" name="confirm_new_password" id="confirm_new_password" require><br/><br/>
        <input type="submit" value="Reset Password" name="ResetPassword">
    </form>
</body>
</html>
