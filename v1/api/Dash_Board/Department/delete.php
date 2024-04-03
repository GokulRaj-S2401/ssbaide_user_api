<?php
include('../../../../DB/connection.php');
try
{

    $dept_id = $_POST['deptid'];
    $sql = "UPDATE ssbaide_departments SET Is_Active = 0 WHERE Department_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dept_id);
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
