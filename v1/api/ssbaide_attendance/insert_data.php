<?php
include('../../../DB/connection.php');

try{
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

        $stmt = $con->prepare("INSERT INTO ssbaide_attendance (d_id, date, department, attendance_mark_list) VALUES (?, ?, ?, ?)");

    if($stmt){
        $id = $data['d_id'];
        $date = $data['date'];
        $department = $data['department'];
        $attendanceMarkList = json_encode($data['attendance_mark_list']);

        $stmt->bind_param("isis", $id, $date, $department, $attendanceMarkList);
        $stmt->execute();

        echo "inserted";
    }
    else{
        echo "error";
    }
}
catch(Exception $e){
    $res = array("status"=>"F", "message"=>"Internal server error!!");
    echo json_encode($res);
}
$con->close();
?>