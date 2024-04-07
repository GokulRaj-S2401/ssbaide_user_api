<?php

include('../../../DB/connection.php');

try{

    $emailID=$_POST['emailID'];
    $staffID=$_POST['staffID'];

    $stmt = $con->prepare("SELECT * FROM ssbaide_user WHERE emailID = ?");
    $stmt->bind_param("s", $emailID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        $stmt = $con->prepare("SELECT staffID,staffName,emailID,password,designation,isApproved,isActive,DateOfBirth,created_on FROM ssbaide_user ");


        if(isset($_POST['emailID'])){

            if ( $staffID === md5($user['staffID']) && $user['isApproved'] == 1 && $user['isActive'] == 1 ){
                $res = array("status" => "S" );
                echo json_encode($res);
            }
            else if($user['isApproved'] == 0 && $user['isActive'] == 1){
                $res = array("status" => "W", "message" => "Waiting For Approve");
                echo json_encode($res);
            }else{
                $res = array("status" => "F", "message" => "Staff ID doesn't match");
                echo json_encode($res);
            }
        }
    }else{
        $res = array("status" => "F", "message" => "Email ID doesn't match");
        echo json_encode($res);
    }
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$con->close();
?>