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
  border-radius: 20px;
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
  <h1>XII SCIENCE</h1>
  <form method="post" id="_form">
    <input type="submit" id="enbtn" class="btn" name="enrol" value="Enroll">
    <button type="button" id="alr" onclick="already()" style="display:none";></button>
    <button type="button" id="suc" onclick="success()" style="display:none";></button>
    <button type="button" id="er" onclick="err()" style="display:none";></button>

    <?php

    //check if the button is clicked
    if(isset($_POST['enrol']))
    {
        unset($_POST['enrol']);
        $user = $_SESSION['username'];
        $cname = "XII SCIENCE";

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
    $sql = "SELECT * FROM course where name = 'XII SCIENCE'";
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
    Science, any system of knowledge that is concerned with the physical world and its phenomena and that entails unbiased observations and systematic experimentation.
    In general, a science involves a pursuit of knowledge covering general truths or the operations of fundamental laws.
    The physical sciences study the inorganic world and comprise the fields of astronomy, physics, chemistry, and the Earth sciences.
    The biological sciences such as biology and medicine study the organic world of life and its processes.
    Social sciences like anthropology and economics study the social and cultural aspects of human behaviour.

    This course provides you a broad introduction about physics, chemistry,biology etc.In this course you will learn
    all the topics that are included in your cbse borad exam.This course preapre you for the borad exam.
</div>

<h2 style="text-align:left">Syllabus</h2>
<div class='column'>
<ul>
<li>Chemistry</li>
<p>Biomolecules
    Amines<br>
    Aldehydes, Ketones and Carboxylic Acids<br>
    Alcohols, Phenols, and Ethers<br>
    Haloalkanes and Haloarenes<br>
    Coordination Compounds<br>
    The d- and f – Block Elements<br>
    The p-Block elements<br>
    Surface Chemistry<br>
    Chemical Kinetics<br>
    Electrochemistry<br>
    Solutions<br>
    Solid State</p>

<li>Physics</li>
<p>Electric Charges and Fields<br>
    Electrostatic Potential and Capacitance<br>
    Moving Charges and Magnetism<br>
    Magnetism and Matter<br>
    Wave Optics<br>
    Ray Optics and Optical Instruments<br>
    Electromagnetic Induction<br>
    Atoms<br>
    Nuclei<br>
    Alternating Current<br>
    Semiconductor Devices: Materials, Devices, and Simple Circuit</p>

<li>Biology</li>
<p>Biodiversity and Conservation<br>
    Organisms And Population<br>
    Biotechnology and its Applications<br>
    Biotechnology: Principles and Processes<br>
    Microbes in Human Welfare<br>
    Human Health and Disease<br>
    Molecular Basis of Inheritance<br>
    Principles of Inheritance And Variation<br>
    Sexual Reproduction in Flowering Plants<br>
    Human Reproduction<br>
    Reproductive Health</p>
  </ul>
</div>

</body>
</html>
