<?php
include('../../../DB/connection.php');

try{
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

        $id = $data['d_id'];
        $date = $data['date'];
        $department = $data['department'];
        $attendanceMarkList = $data['attendance_mark_list'];

            $json_string = json_encode($attendanceMarkList);

            $query = "UPDATE ssbaide_attendance SET attendance_mark_list = ? WHERE d_id = ? AND date = ? AND department = ?";
            $stmt = $con->prepare($query);
            $stmt->execute([$json_string, $id, $date, $department]);

    if($stmt->num_rows() < 0){
        echo "Failed";
    }
    else{
        echo "Updated";
    }
}
catch(Exception $e){
    $res = array("status"=>"F", "message"=>"Internal server error!!");
    echo json_encode($res);
}
$con->close();
?>