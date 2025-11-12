<?php
require_once __DIR__.'/../../../core/Connection.php';

$db = new Connection();
$conn = $db->getConnection();
$role = $_SESSION['role'];

$id = $_GET['id'];
$food_sql = $conn->prepare("SELECT * FROM food_items WHERE id = ?");
$food_sql->bind_param("i",$id);
$food_sql->execute();
$food_result = $food_sql->get_result();
$food_row = $food_result->fetch_assoc();

$admin_food_sql = $conn->prepare("SELECT * FROM food_items_admin where id=?");
$admin_food_sql->bind_param("i",$id);
$admin_food_sql->execute();
$admin_food_result = $admin_food_sql->get_result();
$admin_food_row = $admin_food_result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Update Food Item</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #5db075, #3b8d99);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px 10px;
        }

        .container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
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
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            border-color: #56ab2f;
            outline: none;
        }

        textarea {
            resize: none;
            height: 100px;
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
            margin-top: 20px;
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
     <?php if($role === "donor") {?>   
    <div class="container">
        <h1>Update Food Item Form</h1>

        <form action="index.php?controller=item&action=updatePost" method="post">
            <input type="hidden" name="id" value="<?= $food_row['id']; ?>">

            <label for="name">Food Name:</label>
            <input type="text" name="name" id="name" value="<?= $food_row['name']; ?>">

            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity" value="<?= $food_row['quantity']; ?>">

            <label for="address">Address:</label>
            <textarea name="address" id="address"><?= $food_row['address']; ?></textarea>

            <label for="expire_date">Expire Date:</label>
            <input type="date" name="expire_date" id="expire_date" value="<?= $food_row['expire_date']; ?>">

            <input type="submit" value="Update Food" name="UpdateDonate">
        </form>

        <a href="index.php?controller=item&action=displayDonate" class="back-btn">Back to My Donations</a>
    </div>
    <?php } elseif($role === "admin") {?>
        <div class="container">      
        <h1>Update Food Item Form</h1>

        <form action="index.php?controller=item&action=updatePost" method="post">
            <input type="hidden" name="id" value="<?= $admin_food_row['id']; ?>">

            <label for="name">Food Name:</label>
            <input type="text" name="name" id="name" value="<?= $admin_food_row['name']; ?>">

            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity" value="<?= $admin_food_row['quantity']; ?>">

            <label for="address">Address:</label>
            <textarea name="address" id="address"><?= $admin_food_row['address']; ?></textarea>

            <label for="expire_date">Expire Date:</label>
            <input type="date" name="expire_date" id="expire_date" value="<?= $admin_food_row['expire_date']; ?>">

            <input type="submit" value="Update Food" name="UpdateDonate">
        </form>
        </div>
     <?php } ?>   
</body>
</html>
