<?php

include('../../../DB/connection.php');

$sql="CREATE DATABASE IF not exists ssbaide";


$con->query($sql);
?>