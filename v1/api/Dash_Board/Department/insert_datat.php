<?php
include('../../../../DB/connection.php');

try
{
    if(isset($_POST['deptname']) && isset($_POST['hodid']) && isset($_POST['hodname']) && isset($_POST['createdon']))
    {

        $dept_name = $_POST['deptname'];
        $hod_id = $_POST['hodid'];
        $hod_name= $_POST['hodname'];
        $created_on = $_POST['createdon'];


        $sql = "INSERT INTO ssbaide_departments (Department_Name, Hod_Id, Hod_Name, Created_On) VALUES (?, ?, ?,?)";


        $stmt = $con->prepare($sql);


        $stmt->bind_param("siss", $dept_name, $hod_id, $hod_name, $created_on);


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
