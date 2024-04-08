<?php
include("../../../DB/connection.php");
//late_approval

$sql = "CREATE TABLE ssbaide_specialuser (
    U_Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Email VARCHAR(50) NOT NULL,
    Password VARCHAR(500) NOT NULL,
    Post VARCHAR(20) NOT NULL,
    Is_Active INT DEFAULT 1 , 
    Created_On VARCHAR(10)

) AUTO_INCREMENT=1";

if ($con->query($sql)) 
{
    echo "ssbaide special user table created successfully <br>";
} else 
{
    echo "Error creating table: " . $con->error;
}

$con->close();
?>





<?php
include("../../../DB/connection.php");
//late_approval

$sql = "CREATE TABLE late_approval (
    Approval_Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Staff_Id VARCHAR(10) NOT NULL,
    Staff_Name VARCHAR(50) NOT NULL,
    Reason VARCHAR(200) NOT NULL,
    Approve INT DEFAULT 0 ,
    Date VARCHAR(20) NOT NULL,
    Hour INT NOT NULL,
    Subject_Code VARCHAR(10) NOT NULL,
    Class_Id VARCHAR(10) NOT NULL,
    Is_Active INT DEFAULT 1 , 
    Created_ON VARCHAR(10)

) AUTO_INCREMENT=1";

if ($con->query($sql)) {
    echo "Late approval table created successfully <br>";
} else {
    echo "Error creating table: " . $con->error;
}

$con->close();
?>





<?php
include("../../../DB/connection.php");
//ssbaide_departments

$sql = "CREATE TABLE ssbaide_departments (
    Department_Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Department_Name VARCHAR(100) NOT NULL,
    Hod_Id INT NOT NULL,
    Hod_Name VARCHAR(50) NOT NULL,
    Is_Active INT DEFAULT 1 , 
    Created_ON VARCHAR(10)

) AUTO_INCREMENT=1";

if ($con->query($sql)) {
    echo "Table created successfully <br>";
} else {
    echo "Error creating table: " . $con->error;
}

$con->close();
?>





<?php
include("../../../DB/connection.php");
//ssbaide_classes

$sql = "CREATE TABLE ssbaide_classes (
    Class_Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Class_Name VARCHAR(10) NOT NULL,
    Department_Id INT NOT NULL,
    Is_Active INT DEFAULT 1 , 
    Created_ON VARCHAR(10)

) AUTO_INCREMENT=1";

if ($con->query($sql)) {
    echo "Table created successfully <br>";
} else {
    echo "Error creating table: " . $con->error;
}

$con->close();
?>