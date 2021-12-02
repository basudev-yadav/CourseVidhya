<!DOCTYPE html>
<?php

include 'config.php';
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
  outline: 0;
  display: inline-block;
  border-radius: 20px;
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
  <h1>IIT-JEE</h1>
  <form method="post" id="_form">
    <input type="submit" id="enbtn" class="btn" name="enrol" value="Enroll">
    <button type="button" id="alr" onclick="already()" style="display:none";></button>
    <button type="button" id="suc" onclick="success()" style="display:none";></button>
    <button type="button" id="er" onclick="err()" style="display:none";></button>

    <?php

    if(isset($_POST['enrol']))
    {
        unset($_POST['enrol']);
        $user = $_SESSION['username'];
        $cname = "IIT";

        $price = 0;
        $c_id = 0;
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

        $sql1 = "SELECT * FROM purchase WHERE username='$user' AND course_id ='$c_id'" ;
        $res = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res)>0)
        {
          echo '<script>document.getElementById("alr").click()</script>';
          exit();
        }
        else{

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
  <p class="pi"> 1300 already enrolled </p>
  <p class="pi"> 12 months Program</p>

  <?php

    $price = 0;
    $sql = "SELECT * FROM course where name = 'IIT'";
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
    Through JEE (Advanced), IITs offer admission into undergraduate courses leading to a Bachelor's, Integrated Master's or Bachelor-Master Dual Degree in Engineering, Sciences, or Architecture.
    Both Bachelor's and Master's degrees are awarded to candidates enrolled in the dual degree programs upon successful completion of the course curriculum.
    In a few of the IITs, students enrolled into the 4-year Bachelor's program have the option to convert to B.Tech (Honors) and/or B.Tech. with Minors.
    The types of academic programs offered at IITs and their minimum duration are given in the next page.

    However, not all programs and courses are available in all the institutes.
    The courses that will be offered in academic year 2021-22 will be announced at the time of seat allocation (i.e., filling-in of choices for admission).
    The programs are credit-based and thus offer the flexibility to progress at one's own pace. A minimum level of performance is essential for satisfactory progress.
     The medium of instruction is English.
</div>

<h2 style="text-align:left">Syllabus</h2>
<div class='column'>
<ul>
<li>Physics</li>
<ul>
    <li>Section A</li>
 <p>

    Physics and measurement<br>
    Rotational motion<br>
    Thermodynamics<br>
    Kinematics<br>
    Work, energy and power<br>
    Properties of solids and liquids<br>
    Gravitation<br>
    Laws of motion<br>
    Oscillations and waves<br>
    Electronic devices<br>
    Kinetic theory of gases<br>
    Current electricity<br>
    Communication systems<br>
    Electromagnetic induction and alternating currents<br>
    Magnetic effects of current and magnetism<br>
    Optics<br>
    Electromagnetic waves<br>
    Atoms and nuclei<br>
    Electrostatics<br>
    Dual nature of matter and radiation<br></p>

   <li>Section B</li>

    <p>Experimental Skills</p>
</ul>

<li>Chemistry</li>
<ul>
    <li>Physical Chemistry</li>
    <p>
        Some basic concepts in chemistry<br>
    States of matter<br>
    Atomic structure<br>
    Chemical bonding and molecular structure<br>
    Chemical thermodynamics<br>
    Solutions<br>
    Equilibrium<br>
    Redox reactions and electrochemistry<br>
    Chemical kinetics<br>
    Surface chemistry<br>
    </p>
    <li>Organic Chemistry</li>
    <p>
        Purification and characterisation of organic compounds<br>
Hydrocarbons<br>
Chemistry in everyday life<br>
Principles related to practical chemistry<br>
Organic compounds containing halogens<br>
Organic compounds containing oxygen<br>
Organic compounds containing nitrogen<br>
Polymers<br>
Some basic principles of organic chemistry<br>
Biomolecules<br>
    </p>
    <li>Inorganic Chemistry</li>
    <p>
        Classification of elements and periodicity in properties<br>
Hydrogen<br>
Block elements (alkali and alkaline earth metals)<br>
P Block elements group 13 to group 18 elements<br>
d- and f - block elements<br>
Co-ordination compounds<br>
Environmental chemistry<br>
General principles and processes of isolation of metals<br>
    </p>
</ul>

<li>Mathematics</li>
<p>Complex numbers and quadratic equations<br>
    Matrices and determinants<br>
    Sets, relations and functions<br>
    Mathematical induction<br>
    Permutations and combinations<br>
    Mathematical reasoning<br>
    Limit, continuity and differentiability<br>
    Integral calculus<br>
    Three-dimensional geometry<br>
    Differential equations<br>
    Binomial theorem and its simple applications<br>
    Sequence and Series<br>
    Vector algebra<br>
    Statistics and probability<br>
    Trigonometry<br>
    Co-ordinate geometry</p>
</ul>
</div>

</body>
</html>
