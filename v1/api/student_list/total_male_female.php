<?php
include('../../../DB/connection.php');

try{
    $stmt_male = $con->prepare("SELECT COUNT(*) AS male_count FROM student_list WHERE gender = 'm'");
    $stmt_male->execute();
    $stmt_male->bind_result($male_count);
    $stmt_male->fetch();
    echo " male count: $male_count";
    $stmt_male->close();


    $stmt_female = $con->prepare("SELECT COUNT(*) AS female_count FROM student_list WHERE gender = 'f'");
    $stmt_female->execute();
    $stmt_female->bind_result($female_count);
    $stmt_female->fetch();
    echo " female count: $female_count";
    $stmt_female->close();
    $con->close();
}
catch(Exception $e){
    $res = array("ststus"=>"F", "message"=>"Internale server error");
    echo json_encode($res);
}
?>