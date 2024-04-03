<?php

include('../../../DB/connection.php');

$sql="CREATE DATABASE IF not exists ssbaide";

$con->query($sql);

$sql = "CREATE TABLE ssbaide_user(
    staffID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    staffName VARCHAR(30),
    emailID VARCHAR(50),
    password Varchar(50),
    designation VARCHAR(50),
    isApproved int DEFAULT 1,
    isActive int DEFAULT 1,
    DateOfBirth varchar(20),
    created_on varchar(20)
    )AUTO_INCREMENT=1001";

$con->query($sql);




?>


