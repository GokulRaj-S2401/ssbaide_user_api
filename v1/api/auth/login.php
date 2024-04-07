<?php

include('../../../DB/connection.php');

try{

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
            $res = array("status" => "S", "message" => "Login Successfully","staffID" => md5($user['staffID']),"Email"=> $user['emailID']);
            echo json_encode($res);
        } 
        else if($user['isApproved'] == 0 && $user['isActive'] == 1){
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
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$con->close();
?>
