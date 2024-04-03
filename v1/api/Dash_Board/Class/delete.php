<?php
include('../../../../DB/connection.php');
try
{

    $class_id = $_POST['classid'];
    $sql = "UPDATE ssbaide_classes SET Is_Active = 0 WHERE Class_Id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $class_id);
    if ($stmt->execute()) 
    {
        $res = array("status"=>"S","message"=>"Data deleted");
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
