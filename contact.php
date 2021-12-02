<!--
Module Name : Contact
Function: to get the queries of the user and save them in the backend database
-->

<!DOCTYPE html>
<?php
//including the config file to access the connection variable to the databse
include 'config.php';
//starting the session
session_start();
 ?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Form</title>
  <link rel="stylesheet" href="css/stylecontact.css">

</head>
<body background="images/contact.jpg">
<div class="container">
  <!-- Form to get username, email, phone number, website, and the query(message)-->
  <form id="contact" method="post">
    <h3>Quick Contact</h3>
    <h4>Contact us today and get a reply within 24 hours!</h4>
    <fieldset>
      <input placeholder="Your name" name="user" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" name="phone" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Web Site starts with http://" name="website" type="url" tabindex="4">
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." name="msg" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>

  <script src="http://code.jquery.com/jquery-1.11.1.js"></script>

  <!-- Javascript functions to display customized pop us messages-->
  <script type="text/javascript">
    function success(){
      swal("Query received!", "We will get back to you as soon as possible", "success");
    }
    function err() {
      swal("Failed!", "An error occured while registering your query", "error");
    }
  </script>


  <!-- hidden form to call the functions -->
  <form method="post" id="_form">
    <button type="button" id="suc" onclick="success()" style="display:none";></button>
    <button type="button" id="er" onclick="err()" style="display:none";></button>
  <?php

    //check if the form is submitted
    if(isset($_POST['submit']))
    {
        //store the input data
        $name = $_POST['user'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $website = $_POST['website'];
        $message = $_POST['msg'];

        //save them in the database
        $sql = "INSERT INTO queries (name,email,phone,website,message) VALUES('$name','$email','$phone','$website','$message')";
        $res = mysqli_query($conn,$sql);
        if($res)
        echo '<script>alert("Query registered!")</script>';
        else {
          echo '<script>alert("An error occured while registering query!!")</script>';
        }
    }

   ?>
</div>
</body>
</html>
