<?php
include('../../../DB/connection.php');

$sql = "CREATE TABLE IF NOT EXISTS student_list(
    register_number INT(10) UNSIGNED PRIMARY KEY NOT NULL,
    student_name VARCHAR(50) NOT NULL,
    student_dob VARCHAR(10) NOT NULL,
    class_id INT(10) NOT NULL,
    department_id INT(10) NOT NULL,
    gender VARCHAR(5) NOT NULL,
    isActive INT(1) NOT NULL,
    created_on VARCHAR(10) NOT NULL
)";

if($con->query($sql)){
    echo "created.";
}
else{
    echo "error." .$con->error;
}

$con->close();
?>