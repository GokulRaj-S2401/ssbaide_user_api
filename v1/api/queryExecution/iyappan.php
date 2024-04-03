<?php
include("../../../DB/connection.php");

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