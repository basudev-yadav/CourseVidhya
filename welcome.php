<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="script.js">
    </script>
    <title>COURSEVIDHYA</title>
  </head>
  <body>
    <div class="banner">
      <div class="navbar">
        <?php echo "<h4 class='logo'>Welcome " . $_SESSION['username'] . "!</h4>"; ?>
        <ul>
          <li><a href="welcome1.php">HOME</a></li>
          <li><a href="Courses.html">COURSE</a></li>
          <li><a href="book.php">BOOKS</a></li>
          <li><a href="contact.php">CONTACT US</a></li>
          <li><a href="testimonials.html">TESTIMONIALS</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </div>

      <div class="content">
        <h1>COURSEVIDHYA</h1>
        <p>Transforming your mind and broadening your visions!</p>

        <div>
          <button type="button" onclick="aboutus()"><span></span>LEARN MORE</button>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function aboutus(){
        window.open("aboutus.php")
      }
    </script>
  </body>
</html>
