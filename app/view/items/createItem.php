<?php
require_once __DIR__.'/../../../core/Connection.php';

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === "donor") { ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Donate Food</title>
    <style>
        /* Reset and Base Styles */
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
            font-weight: 600;
            color: #333;
            display: block;
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

        /* Search Section */
        .search-section {
            margin-top: 25px;
            text-align: center;
        }

        .search-section h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .search-section input[type="text"] {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 220px;
            font-size: 14px;
        }

        .search-section button {
            background-color: #28a745;
            border: none;
            color: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-section button:hover {
            background-color: #218838;
        }

        /* My Donation Button */
        .donation-btn {
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

        .donation-btn:hover {
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
            .search-section input[type="text"] {
                width: 80%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Donate Food Form</h1>

        <form action="index.php?controller=item&action=donatePost" method="post">
            <label for="name">Food Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter food name">

            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity" placeholder="e.g., 5 kg">

            <label for="address">Address:</label>
            <textarea name="address" id="address" placeholder="Enter pickup address"></textarea>

            <label for="expire_date">Expire Date:</label>
            <input type="date" name="expire_date" id="expire_date">

            <input type="submit" value="Donate Food" name="Donate">
        </form>
    </div>

    <!-- <div class="search-section">
        <h3>Search Item</h3>
        <form method="GET" action="index.php?controller=auth&action=displayItem">
            <input type="text" name="search" placeholder="Search by name">
            <button type="submit">Search</button> -->
        </form>

        <a href="index.php?controller=item&action=displayDonate" class="donation-btn">My Donations</a>
    </div>

</body>
</html>

        <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('expire_date').setAttribute('min', today);
        </script>
<?php
    } else {
        Utility::setFlashMessage('error_message','Only donor can access!');
        Utility::getFlashMessage('error_message');
        // header("Location:../dashboard.php");
    }
} else {
    Utility::setFlashMessage('error_message','Bad Request!');
    Utility::getFlashMessage('error_message');
    // header("Location:../login.php");
}
?>