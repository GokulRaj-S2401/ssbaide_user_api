<?php
include("../../../../DB/connection.php");

try 
{
    $stmt = $con->prepare("SELECT * from ssbaide_departments ");
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
    $stmt->close();
} 
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$con->close();
?>
