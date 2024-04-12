<?php


include('../../../DB/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 

   
    if (isset($_POST['id'])) {
        try {
            $id = $_POST['id'];
            $Shedule_name = $_POST['Shedule_name'];
            $First_hour_Startingtime = $_POST['First_hour_Startingtime'];
            $First_hour_Endingtime = $_POST['First_hour_Endingtime'];
            $Second_hour_Startingtime = $_POST['Second_hour_Startingtime'];
            $Second_hour_Endingtime = $_POST['Second_hour_Endingtime'];
            $Third_hour_Startingtime = $_POST['Third_hour_Startingtime'];
            $Third_hour_Endingtime = $_POST['Third_hour_Endingtime'];
            $Fourth_hour_Startingtime = $_POST['Fourth_hour_Startingtime'];
            $Fourth_hour_Endingtime = $_POST['Fourth_hour_Endingtime'];
            $Fifth_hour_Startingtime = $_POST['Fifth_hour_Startingtime'];
            $Fifth_hour_Endingtime = $_POST['Fifth_hour_Endingtime'];
            $Active = $_POST['Active'];
            
   
            $stmt = $conn->prepare("UPDATE SSBaide_active_shedule SET Shedule_name=?, First_hour_Startingtime=?, First_hour_Endingtime=?, Second_hour_Startingtime=?, Second_hour_Endingtime=?, Third_hour_Startingtime=?, Third_hour_Endingtime=?, Fourth_hour_Startingtime=?, Fourth_hour_Endingtime=?, Fifth_hour_Startingtime=?, Fifth_hour_Endingtime=?, Active=? WHERE id=?");
            
        
            $stmt->bind_param("siiiiiiiiiiii", $Shedule_name, $First_hour_Startingtime, $First_hour_Endingtime, $Second_hour_Startingtime, $Second_hour_Endingtime, $Third_hour_Startingtime, $Third_hour_Endingtime, $Fourth_hour_Startingtime, $Fourth_hour_Endingtime, $Fifth_hour_Startingtime, $Fifth_hour_Endingtime, $Active, $id);
           
          
            $stmt->execute();
            
         
            if ($stmt->affected_rows > 0) {
            
                $res = array("status" => "F", "message" => "Success Row Update");
                echo json_encode($res);
                exit();
            } else {
              
                $res = array("status" => "F", "message" => "Error updating row");
                echo json_encode($res);
                exit();
            }
        } catch (Exception $e) {
            $res = array("status" => "F", "message" => "Internal server error.");
            echo json_encode($res);
        }
    } else {
        $res = array("status" => "F", "message" => "Missing ID parameter.");
        echo json_encode($res);
    }

    $conn->close();
} else {
    $res = array("status" => "F", "message" => "Invalid request method.");
    echo json_encode($res);
}
