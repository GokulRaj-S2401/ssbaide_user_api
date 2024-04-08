<?php
include('../../../../DB/connection.php');
try
{
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['post']) && isset($_POST['createdon']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $post = $_POST['post'];
        $created_on = $_POST['createdon'];
       
            $stmt = $con->prepare("INSERT INTO ssbaide_specialuser (Email, Password, Post, Created_On) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $email, $password, $post, $created_on);
            if ($stmt->execute())
            {
                $res = array("status"=>"S", "message"=>"Data Inserted Successfully");
                echo json_encode($res);
            } 
            else 
            {
                $res = array("status"=>"F", "message"=>"Data was not stored". $stmt->error);
                echo json_encode($res);
            }
            $stmt->close();
        
    }
    else
    {
        $res = array("status"=>"F", "message"=>"Required all files". $stmt->error);
        echo json_encode($res);

    }
}
catch(Exception $e){
    echo "Internal server error" .$e->getMessage();
}
$con->close();
?>
