<?php
include('../../../../DB/connection.php');

try
{
    if(isset($_POST['staffid']) && isset($_POST['staffname']) && isset($_POST['reason']) && isset($_POST['date']) && isset($_POST['hour']) && isset($_POST['subjectcode']) && isset($_POST['classid']) && isset($_POST['createdon']))
    {

        $staff_id = $_POST['staffid'];
        $staff_name = $_POST['staffname'];
        $reason= $_POST['reason'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $sub_code = $_POST['subjectcode'];
        $class_id = $_POST['classid'];
        $created_on = $_POST['createdon'];


        $sql = "INSERT INTO late_approval (Staff_Id, Staff_Name, Reason, Date, Hour, Subject_Code, Class_Id, Created_On) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


        $stmt = $con->prepare($sql);


        $stmt->bind_param("ssssisss", $staff_id, $staff_name, $reason, $date, $hour, $sub_code, $class_id, $created_on);


        if ($stmt->execute()) {
            $res = array("status"=>"S", " message"=>"Data was stored");
            echo json_encode($res);
            
        } else {
            $res = array("status"=>"F", " message"=>"Error".$sql . "<br>" . $con->error);
            echo json_encode($res);
        }
    }
    else
    {
        $res = array("status"=>"F", " message"=>"All files are required");
        echo json_encode($res);
    }

    $stmt->close();
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$con->close();
?>
