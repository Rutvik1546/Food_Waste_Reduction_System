<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receiver Dashboard | Food Saver</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f9f9f9; font-family: 'Poppins', sans-serif; }
    .navbar { background-color: #2ecc71; }
    .navbar-brand, .nav-link, .navbar-text { color: white !important; }
    .hero { margin-top: 90px; text-align: center; }
    .hero h1 { color: #2ecc71; font-weight: bold; }
    .card { border: none; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .btn-custom { background-color: #2ecc71; color: white; border-radius: 8px; }
    .btn-custom:hover { background-color: #27ae60; }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">🍽️ Food Saver</a>
      <div>
        <a href="index.php?controller=item&action=display" class="nav-link d-inline">Available Food</a>
        <a href="index.php?controller=auth&action=logout" class="btn btn-outline-light btn-sm ms-3">Logout</a>
      </div>
    </div>
  </nav>

  <section class="hero container mt-5">
    <h1>Welcome, < ?= $_SESSION['name']; ?> 🙌</h1>
    <p class="lead text-muted">We’re glad you’re here! Browse available food donations and make a positive impact.</p>

    <div class="row mt-5 justify-content-center">
      <div class="col-md-5">
        <div class="card p-4 text-center">
          <h4>🍲 Available Donations</h4>
          <p>Explore all available food items donated by generous donors.</p>
          <a href="index.php?controller=item&action=display" class="btn btn-custom">View Food Items</a>
        </div>
      </div>
    </div>

    <div class="alert alert-info mt-5" role="alert">
      💚 <strong>Reminder:</strong> Every meal you collect saves both food and lives. Together, we can make a difference!
    </div>
  </section>

  <footer class="text-center mt-5 mb-3 text-muted">
    <small>© 2025 Food Saver | Reducing Waste, Spreading Smiles</small>
  </footer>

</body>
</html> -->
 
<?php
require_once __DIR__ . '/../../../core/Connection.php';
?>
<?php
// Receiver Dashboard Page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Reduction System - Receiver Dashboard</title>
    <style>
        /* Reset & Base Styles */
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
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 25px;
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

        /* Responsive */
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
        <h1>Welcome, <?= htmlspecialchars($_SESSION['name']); ?> </h1>
        <p>We're glad you're here! Browse available food donations and make a positive impact.</p>
        <p>Explore all available food items donated by generous donors.</p>

        <a href="index.php?controller=item&action=displayDonate">View Food Items</a>
        <a href="index.php?controller=auth&action=logout" class="logout">Logout</a>
    </div>
</body>
</html>







<!-- ----------------------------------------------------------------
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Reduction System - Receiver Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['name']; ?> </h1>
    <p>We're glad you're here! Browse available food donations and make a positive impact.</p>
    <p>Explore all available food items donated by generous donors.</p>
    <a href="index.php?controller=item&action=displayDonate">View Food Items</a>&nbsp;&nbsp;&nbsp;
    <a href="index.php?controller=auth&action=logout">Logout</a>
</body>
</html> -->



