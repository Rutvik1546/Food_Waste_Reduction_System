<?php
require_once __DIR__ . '/../../../core/Connection.php';

$db = new Connection();
$conn = $db->getConnection();
$name = $_SESSION['name'] ?? 'None';
$email = $_SESSION['email'] ?? 'None';
$role = $_SESSION['role'];

if (!empty($_GET['search'])) {
    $search = "%" . $_GET['search'] . "%";

    if ($role === "donor") {
        $sql = $conn->prepare("SELECT * FROM food_items WHERE name LIKE ? AND email = ?");
        $sql->bind_param("ss", $search, $email);
    } elseif ($role === "admin") {
        $sql = $conn->prepare("SELECT * FROM food_items_admin WHERE name LIKE ?");
        $sql->bind_param("s", $search);
    } else { // receiver
        $sql = $conn->prepare("SELECT * FROM food_items WHERE name LIKE ?");
        $sql->bind_param("s", $search);
    }
} else {
    if ($role === "donor") {
        $sql = $conn->prepare("SELECT * FROM food_items WHERE email = ?");
        $sql->bind_param("s", $email);
    } elseif($role === "receiver") {
        $sql = $conn->prepare("SELECT * FROM food_items");
    } elseif($role === "admin") {
        $sql = $conn->prepare("SELECT * FROM food_items_admin");
    }
}

$sql->execute();
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Items List</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background: #28a745; color: #fff; }
        a { text-decoration: none; color: blue; }
        a:hover { text-decoration: underline; }
        button a { color: white; }
    </style>
</head>

<body>
<?php if ($role === "donor") { ?>
    <button style="background:#28a745; padding:8px 12px; border:none; border-radius:5px;">
        <a href="index.php?controller=dashboard&action=donor">Back to Dashboard</a>
    </button>

    <?php include_once __DIR__ . '/../../../common/search.php'; ?>

    <h1>Hello, <?= htmlspecialchars($name) ?></h1>
    <h2>Thank you for donating food!</h2>

    <table>
        <thead>
            <tr>
                <th>Id</th><th>Name</th><th>Quantity</th><th>Address</th><th>Expire Date</th><th>Status</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['quantity']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td><?= htmlspecialchars($row['expire_date']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td><a href="index.php?controller=item&action=updateDonate&id=<?= $row['id'] ?>">Update</a></td>
                </tr>
        <?php } } else { ?>
            <tr><td colspan="7">No items found.</td></tr>
        <?php } ?>
        </tbody>
    </table>

<?php } elseif ($role === "receiver") { ?>
    <button style="background:#28a745; padding:8px 12px; border:none; border-radius:5px;">
        <a href="index.php?controller=dashboard&action=receiver">Back to Dashboard</a>
    </button>

    <?php include_once __DIR__ . '/../../../common/search.php'; ?>

    <h1>Hello, <?= htmlspecialchars($name) ?></h1>
    <h2>Here are the available food items</h2>

    <table>
        <thead>
            <tr><th>ID</th><th>Name</th><th>Quantity</th><th>Address</th><th>Expire Date</th><th>Status</th><th>Action</th></tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['status'] === 'available') { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['quantity']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= htmlspecialchars($row['expire_date']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                        <td><a href="index.php?controller=item&action=deleteDonate&id=<?= $row['id'] ?>&name=<?= $name?>&email=<?= $email?>" onclick="return confirm('Are you sure to take item?');">Take Item</a></td>
                    </tr>
        <?php } } } else { ?>
            <tr><td colspan="7">No available food items.</td></tr>
        <?php } ?>
        </tbody>
    </table>

<?php } elseif ($role === "admin") { ?>
    <button style="background:#28a745; padding:8px 12px; border:none; border-radius:5px;">
        <a href="index.php?controller=dashboard&action=admin">Back to Dashboard</a>
    </button>

    <?php include_once __DIR__ . '/../../../common/search.php'; ?>

    <h1>Welcome, Admin</h1>
    <h2>Food Item List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Quantity</th><th>Address</th><th>Expire Date</th>
                <th>Post Date</th><th>Donor Name</th><th>Donor Email</th>
                <th>Receiver Name</th><th>Receiver Email</th><th>Status</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['quantity']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td><?= htmlspecialchars($row['expire_date']) ?></td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                    <td><?= htmlspecialchars($row['donor_name']) ?></td>
                    <td><?= htmlspecialchars($row['donor_email']) ?></td>
                    <td><?= htmlspecialchars($row['receiver_name']) ?></td>
                    <td><?= htmlspecialchars($row['receiver_email']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td>
                        <?php if($row['status'] === 'Taken') { ?>
                            <input type="button" value="Edit" disabled> |
                        <?php } else { ?>
                            <a href="index.php?controller=item&action=updateDonate&id=<?= $row['id'] ?>">Edit</a> |
                        <?php } ?>
                            <a href="index.php?controller=item&action=deleteDonate&id=<?= $row['id'] ?>" onclick="return confirm('Delete this item?');">Delete</a>
                    </td>
                </tr>
        <?php } } else { ?>
            <tr><td colspan="12">No food items found.</td></tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>
</body>
</html>

