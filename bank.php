<!DOCTYPE html>

<?php
//including the config file to access the connection variable to the databse
include 'config.php';
//starting the session
session_start();
 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="jquery-3.3.1.min.js"></script>
<style>
body{
   margin: 0;
   background-color: lightseagreen;
}
html {
  box-sizing: border-box;
}
h2{
    text-transform: capitalize;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bolder;
}
*, *:before, *:after {
  box-sizing: inherit;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: darkcyan;
  color: white;
}
.pi{
    font-family: sans-serif;
    font-weight: bolder;
    color: black;
}

.title {
  color: grey;
}

.row{
  color: black;
  margin: 20px;
  padding: 20px;
  font-family: sans-serif;
}
.column{

  color: black;
  margin: 20px;
  padding: 20px;
  font-family: sans-serif;
}


.about-section .btn {
  border: none;
  border-radius: 20px;
  outline: 0;
  display: inline-block;
  padding: 16px 32px;
  color: white;
  background-color: #000;
  cursor: pointer;
  margin: 4px 2px;
  transition-duration: 0.4s;
  font-size: 16px;
  text-align: left;
}

.about-section .btn:hover {
    background-color: darkgreen;
  color: white;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
h1{
    font-family: sans-serif;
    font-weight: bold;
    color: black;
}
</style>
</head>
<body>

  <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
  <!-- helper functions to display customized pop us messages-->
  <script type="text/javascript">
    function already() {
      swal("User already exists!", "You are already enrolled in this course", "warning");
    }
    function success(){
      swal("Enrolled!", "You are successfully enrolled in this course", "success");
    }
    function err() {
      swal("Failed!", "An error occured while enrolling!", "error");
    }
  </script>

<div class="about-section">
  <h1>Banking Exam</h1>
  <!-- hidden form to call the helper functions -->
  <form method="post" id="_form">
    <input type="submit" id="enbtn" class="btn" name="enrol" value="Enroll">
    <button type="button" id="alr" onclick="already()" style="display:none";></button>
    <button type="button" id="suc" onclick="success()" style="display:none";></button>
    <button type="button" id="er" onclick="err()" style="display:none";></button>

    <?php

    //check if the button is clicked
    if(isset($_POST['enrol']))
    {
        //unset so as to check if user already exists if next time he clicks enroll
        unset($_POST['enrol']);

        //get the username from session variable
        $user = $_SESSION['username'];
        $cname = "BANKING";

        $price = 0;
        $c_id = 0;

        //get the details of course from the database
        $sqlc = "SELECT * FROM course WHERE name='".$cname."'";
        $resc = mysqli_query($conn,$sqlc);
        if($resc)
        {
          $resc = mysqli_fetch_assoc($resc);
          $price = $resc['price'];
          $c_id = $resc['id'];
        }
        else {
          echo '<script>document.getElementById("er").click()</script>';
          exit();
        }

        //check if the user is already enrolled
        $sql1 = "SELECT * FROM purchase WHERE username='$user' AND course_id ='$c_id'" ;
        $res = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res)>0)
        {
          echo '<script>document.getElementById("alr").click()</script>';
          exit();
        }
        else{
        //save the data in the database to keep track of all the purchases
        $sql = "INSERT INTO purchase (username,course_id,price) VALUES('$user','$c_id','$price')";
      	$result = mysqli_query($conn, $sql);
        if($result)
        echo '<script>document.getElementById("suc").click()</script>';
        else {
          echo '<script>document.getElementById("er").click()</script>';
        }
        }
    }
    ?>
  </form>
  <p class="pi"> 1200 already enrolled </p>
  <p class="pi"> 12 months Program</p>

  <?php

    //php snippet to display the course price
    $price = 0;
    $sql = "SELECT * FROM course where name = 'BANKING'";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
      $res = mysqli_fetch_assoc($res);
      $price = $res['price'];
    }

   ?>

  <p class="pi">Price : <?php echo $price ?> Rs</p>
</div>

<h2 style="text-align:left">About this Course</h2>
<div class="row">
    In India, bank exams are often considered in high regard for aspiring candidates who wish to step into the banking domain.
    There are multiple bank exams which are conducted by various banks and testing agencies across the country every year.
     Banking is an increasingly popular choice of employment for fresh graduates and experienced professionals in India.
      Banks provide attractive salaries, a measure of job security and many perks for their employees.
      Due to such reasons, the competition for bank jobs is increasing at an exponential pace.
    The competition indicates that aspirants should have a top-notch bank exam preparation to be able to crack the exam and get selected as a bank employee.
    In this program we will provide you the best content with best faculty.So don't wait just enroll now.
</div>

<h2 style="text-align:left">Syllabus</h2>
<div class='column'>
<ul>
<li>English</li>
<p>Reading Comprehension<br>
    Idioms & Phrases<br>
    Paragraph Jumbles<br>
    Tenses Rules<br>
    (Fill in the blanks)/Cloze Test<br>
    Error Detection<br>
    Multiple Meanings(Contextual Usage)<br>
    Paragraph and passage completion</p>

<li>Reasoning Ability</li>
<p>Logical Reasoning<br>
    Alphanumeric Series<br>
    Directions<br>
    Reasoning Puzzles<br>
    Order and Ranking<br>
    Alphabet Combination<br>
    Data Sufficiency Tests<br>
    Coded Inequalities<br>
    Seating Arrangements<br>
    Picture Series Puzzles<br>
    Tabulation<br>
    Syllogism<br>
    Relationships<br>
    Input/Output<br>
    Coding and Decoding<br>
    Assertion and Reason<br>
    Statement, Argument and Assumption<br>
    Word Formation</p>

<li>Quantitative Aptitude</li>
<p>Simplification and Approximation<br>
    Quadratic Equations<br>
    Profit and Loss<br>
    Mixtures and Alligations<br>
    Simple and Compound Interest<br>
    Surds and Indices<br>
    Work and Time <br>
    Speed, Time and Distance <br>
    Mensuration: Cylinder, Cone, Sphere and Cuboid<br>
    Data Interpretation<br>
    Ratio And Proportion<br>
    Percentages<br>
    Number Series<br>
    Boat Stream<br>
    Series and Sequences<br>
    Permutation and Combination<br>
    Measures of Central Tendency and Variation<br>
    Probability</p>
  </ul>
</div>

</body>
</html>
