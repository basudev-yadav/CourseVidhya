
<?php include 'config.php';
session_start();
?>



<!DOCTYPE html>
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
  padding: 16px 32px;
  border-radius: 20px;
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
  <h1>XII COMMERCE</h1>

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
        $cname = "XII COMMERCE";

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
    $sql = "SELECT * FROM course where name = 'XII COMMERCE'";
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
    Commerce is the conduct of trade among economic agents. Generally, commerce refers to the exchange of goods, services, or something of value, between businesses or entities.
    From a broad perspective, nations are concerned with managing commerce in a way that enhances the well-being of citizens, by providing jobs and producing beneficial goods and services.
    It is important to note that commerce does not have the same meaning as "business," but rather is a subset of business.
    Commerce does not relate to the manufacturing or production process of business but only the distribution process of goods and services.
    The distribution aspect encompasses a wide array of areas, such as logistical, political, regulatory, legal, social, and economic.

    This course provides you a broad introduction about economics,business studies,accountancy.In this course you will learn
    all the topics that are included in your cbse borad exam.This course preapre you for the borad exam.
</div>

<h2 style="text-align:left">Syllabus</h2>
<div class='column'>
<ul>
<li>Economics</li>
<p>Government Budget and the Economy<br>
    Balance of Payments<br>
    Determination of Income and Employment<br>
    Money and Banking<br>
    National Income and Related Aggregates<br>
    Development Experience of India – A Comparison with Neighbours<br>
    Development Experience (1947-90) and Economic Reforms since 1991<br>
    Current Challenges facing Indian Economy</p>

<li>Business studies</li>
<p>Directing<br>
    Nature and Significance of Management<br>
    Controlling<br>
    Principles of Management<br>
    Business Environment<br>
    Organizing<br>
    Staffing<br>
    Planning</p>

<li>Accountancy</li>
<p>Financial Statement Analysis<br>
    Computerized Accounting<br>
    Practical Work<br>
    Project work<br>
    Partnership Firms and Companies</p>
</ul>
</div>

</body>
</html>
