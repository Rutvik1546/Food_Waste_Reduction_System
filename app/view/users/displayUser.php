<?php
require_once __DIR__.'/../../../core/Connection.php';

$db = new Connection();
$conn = $db->getConnection();

$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM users";
if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $sql .= " WHERE name LIKE '%$search%'";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Display Users</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h1, h3 {
            text-align: center;
            color: #333;
        }

        .top-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .top-buttons a {
            background-color: #22c55e;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 6px;
            margin: 5px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .top-buttons a:hover {
            background-color: #16a34a;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px 12px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button[type="submit"] {
            background-color: #22c55e;
            border: none;
            padding: 8px 14px;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 5px;
        }

        button[type="submit"]:hover {
            background-color: #16a34a;
        }

        .clear-btn {
            color: red;
            font-weight: bold;
            text-decoration: none;
            margin-left: 10px;
            font-size: 15px;
        }

        .clear-btn:hover {
            text-decoration: underline;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #22c55e;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a.action-link {
            text-decoration: none;
            font-weight: bold;
            color: #007bff;
        }

        a.action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="top-buttons">
    <a href="index.php?controller=dashboard&action=admin">Back to Dashboard</a>
    <a href="index.php?controller=auth&action=register">Add New User</a>
</div>

<h3>Search User</h3>
<form method="GET" action="index.php">
    <input type="hidden" name="controller" value="auth">
    <input type="hidden" name="action" value="displayUser">
    <input type="text" name="search" placeholder="Search by name" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
    <?php if (!empty($search)) { ?>
        <a href="index.php?controller=auth&action=displayUser" class="clear-btn">❌ Clear</a>
    <?php } ?>
</form>

<h1>User Data</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['role']); ?></td>
                    <td>
                        <a href="index.php?controller=auth&action=updateUser&id=<?= $row['id']; ?>" class="action-link">UPDATE</a> |
                        <a href="index.php?controller=auth&action=deleteUser&id=<?= $row['id']; ?>" class="action-link" onclick="return confirm('Are you sure to delete record?');">DELETE</a>
                    </td>
                </tr>
        <?php } } else { ?>
            <tr>
                <td colspan="5">No users found.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>

