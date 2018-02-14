<?php
session_start();
require('includes/base.php');

if(count($_POST)>0) {
    // Get username and password from email form
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
    $stmt->bind_param("s", $email);

    $email_exists = false;
    
    // start first prepared statement checking for email address
    if($stmt->execute()){
    	// pass email as query parameter
        $stmt->bind_result($email_result);

	// if email exists, turn bool to true
        while($stmt->fetch()){
            $email_exists = true;
        }
        
        // if email exists
        // close email query
        // open password query
        if($email_exists === true){
            $stmt->close();
            $stmt_2 = $conn->prepare("SELECT password FROM users WHERE email=?");
		
            $stmt_2->bind_param("s", $email);
            if($stmt_2->execute()){
                $stmt_2->bind_result($password_result);

                $getRole = false;
                ///////////////////////////////////  Logged in logic  ////////////////////////////////////////////
                while($stmt_2->fetch()){
                    if(password_verify($password, $password_result)){
                        echo "Verified user: ";
                        $getRole = true;
                    }
                    else{//////////////////////// TODO: need a forgot_password.php file
                        echo "Invalid Username or Password! " . "<a href='forgot_password.php'>Forgot password?</a>";
                    }
                }
                $stmt_2->close();
                if($getRole === true){
                    $stmt_4 = $conn->prepare("SELECT first_name FROM users WHERE email_address=?");
                    $stmt_4->bind_param("s", $email);
                    if($stmt_4->execute()){
                        $stmt_4->bind_result($name);
                        while($stmt_4->fetch()){
                            $_SESSION['name'] = $name;
                            $_SESSION['email'] = $email;
                        }
                    }
                    $stmt_4->close();
                    $stmt_3 = $connection->prepare("SELECT role FROM users WHERE email_address=?");
                    $stmt_3->bind_param("s", $email);

                    if($stmt_3->execute()){
                        $stmt_3->bind_result($role_result);

                        while($stmt_3->fetch()){
                            $_SESSION['role'] = $role_result;
                            if($_SESSION['role'] == 'omni'){
                                header("Location: http://localhost/student-portal/administration/omni.php");
                            }
                            else if($_SESSION['role'] == 'student'){
                                header("Location: http://localhost/student-portal/user.php");
                            }
                            else if($_SESSION['role'] == 'parent'){
                                header("Location: http://localhost/student-portal/index.php");
                            }
                            else{
                            }
                        }
                        $stmt_3->close();
                    }
                }
            }
        }
        else{
            $stmt->close();
            echo"Invalid Email or Password! " . "<a href='forgot_password.php'>Forgot password?</a>";
        }

        if($is_user_non_approved){
            if($stmt_5 = $connection->prepare("SELECT contact_info, direct_deposit_info, emergency_contact, DE_4,
DE_2515, DE_2511, DFEH_185, DFEH_188, workers_comp FROM onboarding WHERE email_address=?")){
                $stmt_5->bind_param("s", $_SESSION['email']);
                if($stmt_5->execute()){
                    $stmt_5->bind_result($contact_info, $direct_deposit, $emergency_contact, $DE_4, $DE_2515, $DE_2511,
                        $DFEH_185, $DFEH_188, $workers_comp);
                    while($stmt_5->fetch()){

                    }
                    $stmt_5->close();
                }
            }
            header("Location: http://localhost/employee-portal/non_approved.php");
        }
    }
}