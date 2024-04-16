<?php
include('../../../DB/connection.php');

$sql = "CREATE TABLE IF NOT EXISTS student_list(
    row_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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

<?php
include('../../../DB/connection.php');

$sql = "CREATE TABLE IF NOT EXISTS ssbaide_attendance(
    d_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date VARCHAR(20) NOT NULL,
    department INT(20) NOT NULL,
    attendance_mark_list LONGTEXT NOT NULL
)AUTO_INCREMENT=1";

    if($con->query($sql)){
    echo "created.";
    }
    else{
        echo "error." .$con->error;
    }

$con->close();

?>