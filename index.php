<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DuBo Martial Arts | Home</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<header>
  <nav class="container">
    <div class="nav-left">
      <a href="index.php" class="logo-link">
        <img src="images/logo1.png" alt="DoBu Martial Arts Logo" class="logo-img">
      </a>
      <div class="auth-links" style="margin-bottom: 30px;">
        <?php if (isset($_SESSION['user_name'])): ?>
          <span style="color: white;">Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?>!</span>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="#" onclick="openModal('loginModal')" class="btn-link">Login</a> /
          <a href="#" onclick="openModal('signupModal')" class="btn-link signup">Signup</a>
        <?php endif; ?>
      </div>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">HOME</a></li>
      <li><a href="about.html">ABOUT US</a></li>
      <li><a href="timetable.html">TIMETABLE</a></li>
      <li><a href="pricing.html">MEMBERSHIP</a></li>
      <li><a href="courses.html">COURSES</a></li>
      <li><a href="contact.html">CONTACT</a></li>
    </ul>
  </nav>
</header>

<main>
  <section class="hero">
    <h2>Welcome to DuBo Martial Arts</h2>
    <p>Your journey to discipline, confidence, and strength starts here.</p>
    <a href="pricing.html" class="btn">View Membership Plans</a>
  </section>

  <section class="features">
    <h3>Why Choose Us?</h3>
    <ul>
      <li>Expert Coaches with Accredited Rankings</li>
      <li>Wide Range of Martial Arts: Judo, Jiu-jitsu, Karate, Muay Thai</li>
      <li>Modern Gym Facilities with Steam Room and Sauna</li>
      <li>Specialist Fitness & Self-Defence Courses</li>
    </ul>
  </section>

  <section class="cta">
    <h3>Ready to begin?</h3>
    <p>Check our <a href="timetable.html">class schedule</a> or <a href="contact.html">get in touch</a> today!</p>
  </section>
</main>

<!-- Login Modal -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('loginModal')">&times;</span>
    <h2>Login</h2>
    <form action="login.php" method="post">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
    <p style="margin-top: 15px; font-size: 14px; color: #555;">
      Don't have an account? 
      <a href="#" onclick="switchModals('loginModal', 'signupModal')" style="color: #e63946; text-decoration: none; font-weight: 600; cursor: pointer;">
        Sign up here.
      </a>
    </p>
  </div>
</div>

<!-- Signup Modal -->
<div id="signupModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('signupModal')">&times;</span>
    <h2>Sign Up</h2>
    <form action="signup.php" method="post">
      <input type="text" name="fullname" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Sign Up</button>
    </form>
  </div>
</div>

<script>
  function openModal(id) {
    document.getElementById(id).style.display = 'block';
  }

  function closeModal(id) {
    document.getElementById(id).style.display = 'none';
  }

  function switchModals(closeId, openId) {
    closeModal(closeId);
    openModal(openId);
  }

  window.onclick = function(event) {
    ['loginModal', 'signupModal'].forEach(id => {
      const modal = document.getElementById(id);
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });
  };
</script>

</body>
</html>
