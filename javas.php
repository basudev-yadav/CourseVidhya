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
  <h1>JAVASCRIPT</h1>
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
        $cname = "JAVASCRIPT";

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

  <p class="pi"> 1400 already enrolled </p>
  <p class="pi"> 4 Weeks Program</p>

  <?php

    $price = 0;
    $sql = "SELECT * FROM course where name = 'JAVASCRIPT'";
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
If you want to take your website to the next level, the ability to incorporate interactivity is a must.
But adding some of these types of capabilities requires a stronger programming language than HTML5 or CSS3, and JavaScript can provide just what you need.
With just a basic understanding of the language, you can create a page that will react to common events such as page loads, mouse clicks & movements, and even keyboard input.

This course will introduce you to the basics of the JavaScript language.  We will cover concepts such as variables, looping, functions, and even a little bit about debugging tools.
You will understand how the Document Object Model (DOM) is used by JavaScript to identify and modify specific parts of your page.  After the course, learners will be able to react to DOM Events and dynamically alter the contents and style of their page.
The class will culminate in a  final project - the creation of an interactive HTML5 form that accepts and verifies input.
This is the third course in the Web Design For Everybody specialization.  A basic understanding of HTML and CSS is expected when you enroll in this class.
 Additional courses focus on enhancing the styling with responsive design and completing a capstone project.
</div>

<h2 style="text-align:left">Syllabus</h2>
<div class='column'>
<ul>
<li>WEEK One: Introduction to JAVASCRIPT</li>
<p>If you haven't use a traditional programming language before, this first week is key.
    Before we begin with the how, we will talk about the why, mainly why we want to use JavaScript.
    The main reason is that it is very easy for JavaScript to work with the DOM. And easy is always a great way to start.
    Speaking of starting out, it is also always more fun when our code actually does something we can see, so we will jump quickly into different ways we can generate output.
    It won't be flashy yet, but it will be a great way to get your feet wet with traditional programming.
    After that we go back to the basics of how a computer uses data. We begin with variables, expressions, and operators.</p>

<li>Week Two: Reacting to Your Audience</li>
<p>If you have written HTML code in the past, hopefully you have fallen into the great habit of validating your code -- making sure that you close all of your open tags.
   There are other rules that you may or may not have been following as well, for instance the importance of using each id attribute only once per page.
   This is called writing "clean" code. The reasoning and importance of following these rules becomes clear as we begin to manipulate the different components of your webpage based on the the actions of the person interacting with your page.
   In particular you will learn about the JavaScript Mouse Events and Touch Events. This week's materials will end with a photo gallery example that you can create along with me.</p>

<li>Week Three: Arrays and Looping</li>
<p>This week we will delve into more complex programming concepts: arrays and looping.
    Arrays allow you to represent groups of related information.
    Looping provides efficiency and flexibility to your programs.
     Using both we will expand upon the photo gallery example.</p>

<li>Week Four: Validating Form Data</li>
<p> This week we will put a number of the concepts from this course together to tackle a new project - creating and validating input entered into an HTML5 form.
    Forms are extremely common elements used to input and send data to via a webpage.
    We will look at how you can use JavaScript to add options to your forms, to pre-fill data based on previous input, and even to check that passwords match.
</p>
</ul>
</div>

</body>
</html>
