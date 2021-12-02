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
  <h1>NEET</h1>
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
        $cname = "NEET";

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
    $sql = "SELECT * FROM course where name = 'NEET'";
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
    The National Eligibility and Entrance Test (NEET) is a national level exam held for MBBS/ BDS admissions after class 12.
    In the year 2019, around 15 lakh students applied for the medical exam which is expected to rise this year.
    NEET is conducted once a year and is the prime medical entrance examination in the country.
    NEET 2020 will be conducted by the NTA in the month of May.

    This is a 12 months program that provides you best content with best teachers.

</div>

<h2 style="text-align:left">Syllabus</h2>
<div class='column'>
<ul>
<li>Physics</li>
<p>
    Physical world and measurement<br>
    Electro statistics<br>
    Kinematics	<br>
    Current Electricity<br>
    Laws of Motion<br>
	Magnetic effects of Current and Magnetism<br>
Work, Energy, and Power	<br>
Electromagnetic induction and alternating currents<br>
Motion of systems of particles and rigid body	<br>
Electromagnetic waves<br>
Gravitation	Optics<br>
Properties of Bulk Matter	<br>
Dual Nature of Matter and Radiation<br>
Thermodynamics<br>
	Atoms and Nuclei<br>
Behavior of Perfect Gas and Kinetic theory<br>
	Electronic Devices<br>
Oscillations and wave<br>
</p>

<li>Chemistry</li>
<p>
    Some basic concepts of Chemistry<br>	Solid state<br>
Structure of atom	Solutions<br>
Classification of Elements and Periodicity in Properties<br>	Electrochemistry<br>
Chemical Bonding and Molecular structure<br>	Chemical Kinetics<br>
States of Matter: Gases and liquids<br>	Surface Chemistry<br>
Thermodynamics<br>	General principles and Processes of Isolation of Elements<br>
Equilibrium	<br> P Block elements<br>
Redox reactions<br>	D and F block elements<br>
Hydrogen<br>	Coordination compounds<br>
s-Block elements (Alkali and Alkaline earth metals)<br>	Haloalkanes and Haloarenes<br>
Some p-Block elements<br>	Alcohols, Phenols, and Ethers<br>
Organic Chemistry – Some basic principles and techniques<br>	Aldehydes, Ketones and Carboxylic Acids<br>
Hydrocarbons<br>	Organic compounds containing Nitrogen<br>
Environmental chemistry<br>	Biomolecules, Polymers, and Chemistry in everyday <br>
</p>

<li>Biology</li>
<p>Diversity in the Living World<br>	Reproduction<br>
    Structural organization – Plants and Animals<br>	Genetics and Evolution<br>
    Cell Structure and Function<br>	Biology and Human welfare<br>
    Plant Physiology<br>	Biotechnology and its applications<br>
    Human physiology<br>	Ecology and environment<br>
</p>
</ul>
</div>

</body>
</html>
