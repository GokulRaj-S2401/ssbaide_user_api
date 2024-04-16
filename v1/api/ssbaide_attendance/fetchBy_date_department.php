<?php
include('../../../DB/connection.php');

try{
    $date = $_POST['date'];
    $department = $_POST['department'];
    $stmt = $con->prepare("SELECT attendance_mark_list FROM ssbaide_attendance WHERE date = ? AND department = ?");
    $stmt->bind_param("si", $date, $department);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $res = array($row);
            echo json_encode($res);
        }
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
?>