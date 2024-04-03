<?php
include('../../../DB/connection.php');

try{
    $department_id = $_POST['department_id'];
    $stmt = $con->prepare("SELECT * FROM student_list WHERE department_id = ?");
    $stmt->bind_param("i", $department_id);
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