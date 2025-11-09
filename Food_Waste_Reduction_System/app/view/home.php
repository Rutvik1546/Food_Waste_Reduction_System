
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local Food Waste Reduction System</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: "Poppins", sans-serif;
      color: #333;
      line-height: 1.6;
    }

    /* Navbar */
    header {
      background-color: rgba(255, 255, 255, 0.9);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      position: fixed;
      top: 0;
      width: 100%;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      z-index: 100;
    }
    header h1 {
      color: #2ecc71;
      font-size: 24px;
    }
    nav a {
      text-decoration: none;
      color: #2ecc71;
      margin-left: 20px;
      font-weight: 500;
      transition: color 0.3s;
    }
    nav a:hover {
      color: #27ae60;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url('app/view/food_background.png') center/cover no-repeat;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      padding: 0 20px;
    }
    .hero h2 {
      font-size: 40px;
      margin-bottom: 20px;
    }
    .hero p {
      font-size: 18px;
      max-width: 600px;
      margin-bottom: 30px;
    }
    .btn {
      background-color: #2ecc71;
      color: white;
      padding: 12px 25px;
      text-decoration: none;
      border-radius: 5px;
      margin: 5px;
      transition: background-color 0.3s;
    }
    .btn:hover {
      background-color: #27ae60;
    }
    .btn-outline {
      border: 2px solid white;
      background: transparent;
    }
    .btn-outline:hover {
      background-color: white;
      color: #2ecc71;
    }

    /* How It Works Section */
    section {
      padding: 70px 20px;
      text-align: center;
    }
    h3 {
      color: #2ecc71;
      font-size: 28px;
      margin-bottom: 30px;
    }
    .steps {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 25px;
      margin-top: 30px;
    }
    .step {
      background: #f8f9fa;
      border-radius: 10px;
      padding: 25px;
      width: 280px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }
    .step:hover {
      transform: translateY(-5px);
    }
    .step h4 {
      color: #27ae60;
      margin-bottom: 10px;
    }

    /* Footer */
    footer {
      background-color: #2ecc71;
      color: white;
      text-align: center;
      padding: 15px 0;
    }

    /* Responsive */
    /* @media (max-width: 768px) {
      .hero h2 { font-size: 30px; }
      .steps { flex-direction: column; align-items: center; }
    } */
  </style>
</head>
<body>

  <!-- Navbar -->
  <header>
    <h1>Food Saver</h1>
    <nav>
      <a href="index.php?controller=auth&action=login">Login</a>
      <a href="index.php?controller=auth&action=register">Register</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <h2>Reduce Food Waste. Feed the Hungry.</h2>
    <p>Join our community and make a real difference by sharing surplus food with those who need it most.</p>
    <a href="index.php?controller=auth&action=register" class="btn">Donate Now</a>
    <a href="index.php?controller=auth&action=register" class="btn btn-outline">Request Food</a>
  </section>

  <!-- How It Works -->
  <section>
    <h3>How It Works</h3>
    <div class="steps">
      <div class="step">
        <h4>Donors List Food</h4>
        <p>Restaurants and homes list details of extra food before it goes to waste.</p>
      </div>
      <div class="step">
        <h4>Receivers Request</h4>
        <p>NGOs and individuals can request available food items nearby.</p>
      </div>
      <div class="step">
        <h4>Food Distributed</h4>
        <p>Donors and receivers coordinate to deliver and share food efficiently.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Local Food Waste Reduction System | Made with  by Rutvik, Jaymin & Rudra</p>
  </footer>

</body>
</html>
