<?php
include('../../../DB/connection.php');

$table = "CREATE TABLE IF NOT EXISTS SSBaide_active_shedule (
    id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Shedule_name VARCHAR(200),
    First_hour_Startingtime INT(50),
    First_hour_Endingtime INT(50),
    Second_hour_Startingtime INT(50),
    Second_hour_Endingtime INT(50),
    Third_hour_Startingtime INT(50),
    Third_hour_Endingtime INT(50),
    Fourth_hour_Startingtime INT(50),
    Fourth_hour_Endingtime INT(50),
    Fifth_hour_Startingtime INT(50),
    Fifth_hour_Endingtime INT(50),
    Active INT(10)
)";


if ($conn->query($table)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
