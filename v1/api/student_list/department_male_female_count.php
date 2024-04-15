<?php
include('../../../DB/connection.php');

try{
    $class_id = $_POST['department_id'];
    $stmt_male = $con->prepare("SELECT COUNT(*) AS count FROM student_list WHERE department_id = ? AND gender = 'male'");
    $stmt_male->bind_param("i", $class_id);
    $stmt_male->execute();
    $stmt_male->bind_result($countm);
    $stmt_male->fetch();
    echo "male count: $countm";
    $stmt_male->close();

    $stmt_female = $con->prepare("SELECT COUNT(*) AS count FROM student_list WHERE department_id = ? AND gender = 'female'");
    $stmt_female->bind_param("i", $class_id);
    $stmt_female->execute();
    $stmt_female->bind_result($countf);
    $stmt_female->fetch();
    echo " female count: $countf";
    $stmt_female->close();
    $con->close();
}
catch(Exception $e){
    $res = array("status"=>"F", "message"=>"Internal server error!!");
    echo json_encode($res);
}

?>