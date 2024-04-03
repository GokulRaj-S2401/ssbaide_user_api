<?php
include('../../../../DB/connection.php');
try
{
    $class_id = $_POST['classid'];
    $sql = "SELECT * FROM ssbaide_classes WHERE Class_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) 
    {
    
        while ($row = $result->fetch_assoc()) 
        {
            $res=array("status"=>"S","Data"=>$row);
            echo json_encode($res);
            
        }
    } 
    else 
    {
        $res=array("status"=>"F","message"=>"Internal server error");
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
