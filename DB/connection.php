<?php

$servername = "localhost"; 
$username = "root"; 
<<<<<<< Updated upstream
$password = "ssbaide220";
$database = "ssbaide"; 
=======
$password = "ssbaide220"; 
$datbase = "ssbaide";
$con = new mysqli($servername, $username, $password,$datbase);
>>>>>>> Stashed changes

$con = new mysqli($servername, $username, $password, $database);

?>
