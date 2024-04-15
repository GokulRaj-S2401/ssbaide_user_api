<?php
include('../../../DB/connection.php');
try{
    if(isset($_FILES['csv_file'])){
        $file = $_FILES['csv_file']['tmp_name'];
    
    if(($handle = fopen($file, "r")) !== FALSE){
        while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $sql = "INSERT INTO student_list (roll_no, student_name, gender, department_id, class_id, email, isActive, created_on) VALUES ('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."', '".$data[4]."', '".$data[5]."', '".$data[6]."', '".$data[7]."')";
    
            if($con->query($sql) === TRUE){
                echo "Record iserted successfully";
            }
            else{
                echo "Error" .$sql. "<br>" .$con->error;
            }
        }
        fclose($handle);
    }
    }
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$con->close();


?>