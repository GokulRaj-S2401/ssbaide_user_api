<?php
include('../../../DB/connection.php');
try{
    if(isset($_POST['register_number']) && isset($_POST['student_name']) && isset($_POST['student_dob']) && isset($_POST['class_id']) && isset($_POST['department_id']) && isset($_POST['gender']) && isset($_POST['isActive']) && isset($_POST['created_on']));
        $stmt = $con->prepare("INSERT INTO student_list (register_number, student_name, student_dob, class_id, department_id, gender, isActive, created_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issiisis", $register_number, $student_name, $student_dob, $class_id, $department_id, $gender, $isActive, $created_on);
            $register_number = $_POST['register_number'];
            $student_name = $_POST['student_name'];
            $student_dob = $_POST['student_dob'];
            $class_id = $_POST['class_id'];
            $department_id = $_POST['department_id'];
            $gender = $_POST['gender'];
            $isActive = isset($_POST['isActive']) ? $_POST['isActive'] : 1;
            $created_on = $_POST['created_on'];

            if($stmt->execute()){
                $res = array("status"=>"S", "message"=>"Inserted successfully.");
                echo json_encode($res);
            }
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$con->close();


?>