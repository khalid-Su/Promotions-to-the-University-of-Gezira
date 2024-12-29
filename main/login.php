<?php
    // Start session
    session_start();
        // Array to store validation errors
    $errmsg_arr = array();
        // Validation error flag
    $errflag = false;
        // Connect to mysqli server
    $link = mysqli_connect('localhost','uofgedu_AD_User',"ADUOFG2024@#");
    if(!$link) {
        die('Failed to connect to server: ' . mysqli_error($link));
    }
        // Select database
    $db = mysqli_select_db($link,'uofgedu_ad');
    if(!$db) {
        die("Unable to select database");
    }
        // Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        global $link;
        $str = @trim($str);
        $str = stripslashes($str);
        return mysqli_real_escape_string($link, $str);
    }
        // Sanitize the POST values
    $login = clean($_POST['username']);
    $password = clean($_POST['password']);
        // Input Validations
    if($login == '') {
        $errmsg_arr[] = 'Username missing';
        $errflag = true;
    }
    if($password == '') {
        $errmsg_arr[] = 'Password missing';
        $errflag = true;
    }
        // If there are input validations, redirect back to the login form
    if($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: index.php");
        exit();
    }
        // Create query
    $qry = "SELECT * FROM user WHERE username='$login' AND password='$password'";
    $result = mysqli_query($link, $qry);
        // Check whether the query was successful or not
    if($result) {
        if(mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $member = mysqli_fetch_assoc($result);
            // Check the 'stat' column
            if ($member['stat'] == 0) {
                // Login Successful
                session_regenerate_id();
                $_SESSION['SESS_MEMBER_ID'] = $member['id'];
                $_SESSION['SESS_FIRST_NAME'] = $member['name'];
                $_SESSION['SESS_LAST_NAME'] = $member['position'];
          
                header("location:main/customer.php");
                ob_end_flush();
                 exit();
            } else {
                // User status is not active
                $errmsg_arr[] = 'حسابك غير نشط. يرجى الاتصال بالمسؤول.';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: index.php");
                exit();
            }
        } else {
            // Login failed
            $errmsg_arr[] = 'Invalid username or password.';
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: index.php");
            exit();
        }
    } else {
        die("Query failed");
    }
?>
