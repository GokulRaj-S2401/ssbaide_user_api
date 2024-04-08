<?php
include("../../../../DB/connection.php");
try
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $stmt = $con->prepare("SELECT U_Id, Post, Created_On  FROM ssbaide_specialuser WHERE Email = ? AND Password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result=$stmt->get_result();

        if ($row =$result->fetch_assoc()) 
        {
            $res = array("status:"=>"S","message"=>"Login Successfully","Data"=>$row);
            echo json_encode($res);
        } 
        else 
        {
            $res = array("status:"=>"F","message"=>"Server error");
            echo "Invalid email or password";
        }
    }
    $stmt->close();
}
        catch(Exception $e)
        {
            echo "Internal server error" .$e->getMessage();
        }
        $con->close();
    



// Close connection
?>