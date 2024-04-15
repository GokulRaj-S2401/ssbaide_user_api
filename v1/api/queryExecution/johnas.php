<?php
include('../../../DB/connection.php');

$sql = "CREATE TABLE IF NOT EXISTS student_list(
    row_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    roll_no BIGINT(20) NOT NULL,
    student_name VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    department_id INT(10) NOT NULL,
    class_id INT(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    isActive INT(2) NOT NULL,
    created_on VARCHAR(10) NOT NULL
)AUTO_INCREMENT=1";

if($con->query($sql)){
    echo "created.";
}
else{
    echo "error." .$con->error;
}

$con->close();
?>