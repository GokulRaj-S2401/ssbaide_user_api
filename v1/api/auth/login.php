<?php

include('../../../DB/connection.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM ssbaide_user WHERE emailID = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        $stmt = $con->prepare("SELECT staffID,staffName,emailID,password,designation,isApproved,isActive,DateOfBirth,created_on FROM ssbaide_user ");

        if (md5($password) === $user['password'] && $user['isApproved'] == 1 && $user['isActive'] == 1 ) {
            $res = array("status" => "S", "message" => "Login Successfully");
            echo json_encode($res);


            //User_Authentication 

            $staffID = $user['staffID'];
            
            // $StaffId = $_POST['staffID'];

            if(isset($_POST['staffID'])){

                if ( md5($staffID) === md5($_POST['staffID']) && $user['isApproved'] == 1 && $user['isActive'] == 1 ){
                    $res = array("status" => "S" ,"data" => $user);
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
        } 
        else if($user['isApproved'] == 0 ){
            $res = array("status" => "W", "message" => "Waiting For Approve");
            echo json_encode($res);

        }else {
            $res = array("status" => "F", "message" => "...Invalid email or password");
            echo json_encode($res);
        }
    } else {
        $res = array("status" => "F", "message" => "Invalid email or password...");
        echo json_encode($res);
    }
    $stmt->close();
} else {
    $res = array("status" => "F", "message" => "Missing email or password");
    echo json_encode($res);
}

$con->close();
?>
