<?php
include('../../../../DB/connection.php');
try
{

    $approval_id = $_POST['approvalid'];
    $sql = "UPDATE late_approval SET Approve = 1,Is_Active = 0 WHERE Approval_Id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $approval_id);
    if ($stmt->execute()) 
    {
        $res = array("status"=>"S","message"=>"Approve And Is_active changed");
        echo json_encode($res);
    } else 
    {
        $res = array("status"=>"F","message"=>"Internal server error" .$con->error);
        echo json_encode($res);
       
    }
    $stmt->close();
}
catch(Exception $e)
{
    
    echo "Internal server error" .$e->getMessage();
}
$con->close();
?>