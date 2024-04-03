<?php
include('../../../DB/connection.php');
try{
    if(  isset($_POST['staffName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['designation'])  && isset($_POST['DOB']) && isset($_POST['created_on'])){

        $qry = $con->prepare( "INSERT INTO ssbaide_user (staffName,emailID, password,designation,DateOfBirth,created_on) VALUES (?,?,?, CASE ?
        WHEN 1 THEN 'HOD'
        WHEN 2 THEN 'Staff'
        END,?,?) " );
        $qry->bind_param("sssiss", $staffName, $email, $password, $designation ,$DOB, $created_on);

        $staffName = $_POST['staffName'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $designation = $_POST['designation'];
        $DOB = $_POST['DOB'];
        $created_on = $_POST['created_on'];

        if($qry->execute()){
            $res = array("status"=>"S", "message"=>"Signup successfully.");
            echo json_encode($res);
        }

    }else{
        $res = array("status"=>"F", "message"=>"All Fields Are Required.");
            echo json_encode($res);
    }
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$con->close();
?>