<?php

session_start();

//end the session
session_destroy();

//redirect to login page
header("Location: index.php");

?>
