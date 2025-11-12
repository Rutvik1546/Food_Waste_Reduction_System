<?php
require_once __DIR__.'/../../../core/Connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Connection();
    $conn = $db->getConnection();
    $sql = $conn->prepare("SELECT * from users where id = ?");
    $sql->bind_param("i",$id);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();

} else {
    Utility::setFlashMessage('error_message','Bad Request Found!');
    Utility::getFlashMessage('error_message');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Update Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #5db075, #3b8d99);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 450px;
            padding: 40px 35px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
        }

        form {
            text-align: left;
        }

        label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            border-color: #56ab2f;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #56ab2f;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #3b7a1f;
        }

        .back-btn {
            display: inline-block;
            background-color: #218838;
            color: #fff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            margin-top: 15px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #1e7e34;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Update User</h1>

        <form action="index.php?controller=auth&action=updateUserPost&id=<?= $row['id']; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($row['name']); ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($row['email']); ?>">

            <label for="role">Role:</label>
            <select name="role" id="role">
                <option >Choose Role</option>
                <option value="donor" <?= ($row['role'] === 'donor') ? 'selected' : ''; ?>>Donor</option>
                <option value="receiver" <?= ($row['role'] === 'receiver') ? 'selected' : ''; ?>>Receiver</option>
            </select>

            <input type="submit" value="Update" name="Update">
        </form>

        <a href="index.php?controller=auth&action=displayUser" class="back-btn">Back to User List</a>
    </div>

</body>
</html>
