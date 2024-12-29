<?php
// Start session
session_start();

// Connect to the database
include('../connect.php');

// Check if the user is logged in
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    // Get the current user's ID
    $userId = $_SESSION['SESS_MEMBER_ID'];

    // Update the user's 'stat' to 1
    $qry = "UPDATE user SET stat = 1 WHERE id = '$userId'";
    if (mysqli_query($link, $qry)) {
        // Successfully updated, now log out
        unset($_SESSION['SESS_MEMBER_ID']);
        unset($_SESSION['SESS_FIRST_NAME']);
        unset($_SESSION['SESS_LAST_NAME']);
        session_destroy();

        // Redirect to the login page
        header("location: index.php");
        exit();
    } else {
        die('Failed to update user status: ' . mysqli_error($link));
    }
} else {
    // If no user is logged in, redirect to login page
    header("location: index.php");
    exit();
}
?>
