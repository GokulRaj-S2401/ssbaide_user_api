<?php
include('../../../../DB/connection.php');

try
{
    if(isset($_POST['classname']) && isset($_POST['departmentid']) && isset($_POST['createdon']))
    {

        $class_name = $_POST['classname'];
        $department_id = $_POST['departmentid'];
        $created_on = $_POST['createdon'];


        $sql = "INSERT INTO ssbaide_classes (Class_Name, Department_Id, Created_On) VALUES (?, ?, ?)";


        $stmt = $conn->prepare($sql);


        $stmt->bind_param("sis", $class_name, $department_id, $created_on);


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
