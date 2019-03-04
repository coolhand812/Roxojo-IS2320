<?php
    session_start();    // Starting Session
    $error='';          // Variable To Store Error Message
    $userlvl='';        // Variable to store user level
    if (isset($_POST['submit'])) {      // Verifies submit was selected
        if (empty($_POST['username']) || empty($_POST['password'])) {   //checks fields are not empty
            $error = "Username or Password is invalid";
            echo $error;    // displays message if either field is empty     
        }
        else {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $db = new mysqli("localhost", "root", "", "ruxojo_accountsreceivable");

            /* check connection */
            if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
            }

            // SQL query to fetch information of registerd users and finds user match.
            // add MD5 to pswd
            $sql = "SELECT id FROM admin_table WHERE user_name= '$username' AND
             p_word= '$password'";
            //$userlvl=$_SESSION['user_level'];
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($result);
            if ($count == 0) {
                $error = "Username or Password is invalid";
                echo $error;
                
            } else {
                if($_SESSION['user_level'] == 1){
                    $_SESSION['login_user']=$username; // Initializing Session
                    header("Location: SU_Menuscreen.html");
                }else{
                    $_SESSION['login_user']=$username; // Initializing Session
                    header("Location: User_Menuscreen.html");
                }
            }
            mysqli_close($db); // Closing Connection
        }
    }
    else {
        echo 'post submit error';
    }
?>