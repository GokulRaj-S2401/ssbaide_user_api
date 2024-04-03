<?php
include('../../../DB/connection.php');

try{
    $register_number = $_POST['register_number'];
    $stmt = $con->prepare("SELECT * FROM student_list WHERE register_number = ?");
    $stmt->bind_param("i", $register_number);
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