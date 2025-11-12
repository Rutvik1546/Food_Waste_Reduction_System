<?php
require_once __DIR__ . '/../../../core/Connection.php';
$_SESSION['role'] = 'admin';
$_SESSION['email'] = 'admin@gmail.com';
$_SESSION['name'] = "Admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Reduction System - Admin Dashboard</title>
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
            max-width: 600px;
            padding: 40px 30px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
            font-size: 16px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            background-color: #56ab2f;
            color: #fff;
            padding: 12px 20px;
            border-radius: 6px;
            margin: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #3b7a1f;
            transform: scale(1.05);
        }

        .logout {
            background-color: #e74c3c;
        }

        .logout:hover {
            background-color: #c0392b;
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
                padding: 25px 20px;
            }

            a {
                display: block;
                margin: 10px auto;
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Admin!</h1>
        <p>Here you can manage all food donations and users.</p>
        <a href="index.php?controller=auth&action=displayUser">Manage Users</a>
        <a href="index.php?controller=item&action=displayDonate">View All Food Items</a><br><br>
        <a href="index.php?controller=auth&action=logout" class="logout">Logout</a>
    </div>
</body>
</html>
