<?php
    session_start();    // Starting Session
    $error='';          // Variable To Store Error Message
    if (isset($_POST['submit'])) {      // Verifies submit was selected
        if (empty($_POST['username']) || empty($_POST['password'])) {   //checks fields are not empty
            $error = "Username or Password is invalid";     // displays message if either field is empty
        }
        else {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $db = new mysqli("localhost", "root", "", "ruxojo_accountsreceivable");
            
            // SQL query to fetch information of registerd users and finds user match.
            // add MD5 to pswd
            $stmt = $db->prepare("SELECT username FROM admin_table WHERE username= '$username' AND
             password= '$password'");
            $stmt->bind_param('ss', $username, $password); 
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows == 0) {
                $error = "Username or Password is invalid";
                
            } else {
                session_register("myusername");
                $_SESSION['login_user']=$username; // Initializing Session
                
            }
            mysqli_close($db); // Closing Connection
        }
    }
    else {
        echo 'post submit error';
    }
?>