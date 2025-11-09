<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donor Dashboard | Food Saver</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f4f6f7; font-family: 'Poppins', sans-serif; }
    .navbar { background-color: #27ae60; }
    .navbar-brand, .nav-link, .navbar-text { color: white !important; }
    .welcome { margin-top: 90px; text-align: center; }
    .welcome h1 { color: #27ae60; font-weight: 700; }
    .card { border: none; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .btn-custom { background-color: #27ae60; color: white; border-radius: 8px; }
    .btn-custom:hover { background-color: #1e8449; }
  </style>
</head>
<body>

  < !-- Navbar -->
  <!-- <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">🍽️ Food Saver</a>
      <div>
        <a href="index.php?controller=item&action=create" class="nav-link d-inline">Donate Food</a>
        <a href="index.php?controller=item&action=display" class="nav-link d-inline">My Donations</a>
        <a href="index.php?controller=auth&action=logout" class="btn btn-outline-light btn-sm ms-3">Logout</a>
      </div>
    </div>
  </nav> -->

  <!-- Main Content -->
  <!-- <section class="welcome container mt-5">
    <h1>Welcome, < ?= $_SESSION['name']; ?> 🌟</h1>
    <p class="lead text-muted">Your generosity helps reduce hunger and save the planet from food waste.</p>

    <div class="row mt-5 justify-content-center">
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <h4>🍱 Donate New Food</h4>
          <p>List available surplus food to help someone in need.</p>
          <a href="index.php?controller=item&action=create" class="btn btn-custom">Donate Now</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <h4>📦 View Donations</h4>
          <p>See all your donated items and manage them easily.</p>
          <a href="index.php?controller=item&action=display" class="btn btn-custom">My Donations</a>
        </div>
      </div>
    </div>

    <div class="alert alert-success mt-5" role="alert">
      🌍 <strong>Thank You!</strong> Your contribution today creates hope and happiness for many tomorrow.
    </div>
  </section>

  <footer class="text-center mt-5 mb-3 text-muted">
    <small>© 2025 Food Saver | Together We End Food Waste</small>
  </footer>

</body> -->
<!-- < /html > -->
<?php 
require_once __DIR__ . '/../../core/Controller.php';
?>

<?php
// Donor Dashboard Page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Waste Reduction System - Donor Dashboard</title>
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

    .lead {
      color: #555;
      font-size: 16px;
      margin-bottom: 30px;
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
    <h1>Donor Dashboard</h1>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['name']); ?></h1>
    <p class="lead">Your generosity helps reduce hunger and save the planet from food waste.</p>

    <a href="index.php?controller=item&action=donate">Donate Food</a>
    <a href="index.php?controller=auth&action=logout" class="logout">Logout</a>
  </div>
</body>
</html>






<!-- -----------------------------------------------------------
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Waste Reduction System - Donor Dashboard</title>
</head>
<body>
  <h1>Donor Dashboard</h1>
  <h1>Welcome, <?= $_SESSION['name']; ?></h1>
  <p class="lead text-muted">Your generosity helps reduce hunger and save the planet from food waste.</p>
  <a href="index.php?controller=item&action=donate">Donate Food</a> &nbsp; &nbsp;
  <a href="index.php?controller=auth&action=logout">Logout</a>
  
</body>
</html> -->