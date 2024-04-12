<?php
   include('../../../DB/connection.php');
try
{
    if(isset($_POST['Shedule_name']) && isset($_POST['First_hour_Startingtime']) && isset($_POST['First_hour_Endingtime']) && isset($_POST['Second_hour_Startingtime']) && isset($_POST['Second_hour_Endingtime']) && isset($_POST['Third_hour_Startingtime']) && isset($_POST['Third_hour_Endingtime']) && isset($_POST['Fourth_hour_Startingtime']) && isset($_POST['Fourth_hour_Endingtime']) && isset($_POST['Fifth_hour_Startingtime']) && isset($_POST['Fifth_hour_Endingtime'])&& isset($_POST['Active'])) 
    {
        
        $Shedule_name = $_POST['Shedule_name'];
        $First_hour_Startingtime = $_POST['First_hour_Startingtime'];
        $First_hour_Endingtime  = $_POST['First_hour_Endingtime'];
        $Second_hour_Startingtime = $_POST['Second_hour_Startingtime'];
        $Second_hour_Endingtime = $_POST['Second_hour_Endingtime'];
        $Third_hour_Startingtime  = $_POST['Third_hour_Startingtime'];
        $Third_hour_Endingtime = $_POST['Third_hour_Endingtime'];
        $Fourth_hour_Startingtime  = $_POST['Fourth_hour_Startingtime'];
        $Fourth_hour_Endingtime = $_POST['Fourth_hour_Endingtime'];
        $Fifth_hour_Startingtime  = $_POST['Fifth_hour_Startingtime'];
        $Fifth_hour_Endingtime = $_POST['Fifth_hour_Endingtime'];
        $Active = $_POST['Active'];
        $statement = $conn-> prepare ("INSERT INTO SSBaide_active_shedule ( Shedule_name , First_hour_Startingtime , First_hour_Endingtime , Second_hour_Startingtime , Second_hour_Endingtime , Third_hour_Startingtime , Third_hour_Endingtime , Fourth_hour_Startingtime , Fourth_hour_Endingtime , Fifth_hour_Startingtime , Fifth_hour_Endingtime , Active )   VALUES  (?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("siiiiiiiiiii",$Shedule_name,$First_hour_Startingtime,$First_hour_Endingtime,$Second_hour_Startingtime,$Second_hour_Endingtime,$Third_hour_Startingtime,$Third_hour_Endingtime,$Fourth_hour_Startingtime,$Fourth_hour_Endingtime,$Fifth_hour_Startingtime,$Fifth_hour_Endingtime,$Active);
        $statement->execute();
        $result=$statement->get_result();
        if($result> 0)
        {
            $res=array("status"=>"F","message"=>"Data was not stored");
            echo json_encode($res);
        }
        else
        {
            $res=array("status"=>"S","message"=>"Data was stored");
            echo json_encode($res);
        }
    }
    else
    {
        $res = array("status"=>"F", "message"=>"All fields are required.");
        echo json_encode($res);
    }
    $statement->close();
}
catch(Exception $e)
{
    echo "Internal server error" .$e->getMessage();
}
$conn->close();
