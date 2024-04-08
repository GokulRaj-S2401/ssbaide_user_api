<?php
include('../../../../DB/connection.php');
try
{
    $sql = "SELECT * FROM late_approval WHERE Approve=0 AND Is_Active=1 ORDER BY Created_On ASC";
    $result = $con->query($sql);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $res=array("status"=>"S", "Data"=>$row);
            echo json_encode($res);
        }
    } 
    else 
    {
        $res=array("status"=>"F", "message"=>"Data was not found");
        echo json_encode($res);
    }
}

catch(Exception $e)
{
    echo "Internal server error" .$e->getMessage();
}
$con->close();
?>
