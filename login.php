<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
        }
        else {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $db = new mysqli("localhost 1234", "root", "", "Ruxojo");
            
            // SQL query to fetch information of registerd users and finds user match.
            // add MD5 to pswd
            $stmt = $db->prepare("SELECT username, password FROM user_table WHERE username=? AND password=(?)");
            $stmt->bind_param('ss', $email, $password); 
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows == 0) {
                $error = "Username or Password is invalid";
                
            } else {
                $_SESSION['login_user']=$username; // Initializing Session
                //header ("location:gmapsFinder.php");
            }
            mysqli_close($db); // Closing Connection
        }
    }
    else {
        echo 'post submit error';
    }
?>