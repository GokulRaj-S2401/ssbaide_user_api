<?php
     include('../../../DB/connection.php');
  if(isset($_POST['id']))
        try{
            $id = $_POST['id'];
             $stmt = $conn->prepare("SELECT * FROM SSBaide_active_shedule WHERE  id = ?");
             $stmt->bind_param("i",  $id);
             $stmt->execute();
             $result = $stmt->get_result();

                 if($row = $result->fetch_assoc()){
                     $res = array("id".$row['id']."Shedule_name:". $row['Shedule_name']."    First_hour_Startingtime".$row['First_hour_Startingtime']."      First_hour_Endingtime".$row['First_hour_Endingtime']."    Second_hour_Startingtime".$row['Second_hour_Startingtime']."      Second_hour_Endingtime".$row['Second_hour_Endingtime'] ."    Third_hour_Startingtime".$row['Third_hour_Startingtime']."      Third_hour_Endingtime".$row['Third_hour_Endingtime']."    Fourth_hour_Startingtime".$row['Fourth_hour_Startingtime']."      Fourth_hour_Endingtime".$row['Fourth_hour_Endingtime']."    Fifth_hour_Startingtime".$row['Fifth_hour_Startingtime']."      Fifth_hour_Endingtime".$row['Fifth_hour_Endingtime']."Active:". $row['Active']);
                     echo json_encode($res);
             }
                else{
                     $res =  array("status"=>"S", "message"=>"Internal server error.");
                     echo json_encode($res);
                 }

                 
            $stmt->close();

                }
        catch(Exception $e){
            $res = array("status"=>"F", "message"=>"Internal server error.");
            echo json_encode($res);
        }
    $conn->close();

