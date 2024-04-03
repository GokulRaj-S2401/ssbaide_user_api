<?php
include('../../../DB/connection.php');

try{
    $class_id = $_POST['class_id'];
    $stmt = $con->prepare("SELECT * FROM student_list WHERE class_id = ?");
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $result = $stmt->get_result();

        if($row = $result->fetch_assoc()){
            $res = array($row);
            echo json_encode($res);
        }
        else{
            $res = array("status"=>"F", "message"=>"Internal server error!!");
            echo json_encode($res);
        }
    $stmt->close();
}
catch(Exception $e){
    $res = array("status"=>"F", "message"=>"Internal server error!!");
    echo json_encode($res);
}
$con->close();
?>