<?php
include("connection.php");

$sql = "CREATE TABLE ssbaide_classes (
    Class_Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY  ,
    Class_Name VARCHAR(10) NOT NULL,
    Department_Id INT NOT NULL,
    Is_Active INT DEFAULT 1 , 
    Created_ON VARCHAR(10)

) AUTO_INCREMENT=1";

if ($conn->query($sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>