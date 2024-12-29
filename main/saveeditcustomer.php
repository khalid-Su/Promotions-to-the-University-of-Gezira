<?php
// configuration
include('../connect.php');

// new data from the form
$id = $_POST['memi']; // customer id
$a = $_POST['FullName']; // Name
$b = $_POST['College']; // College
$c = $_POST['GeneralSpecialization']; // General Specialization
$d = $_POST['DetailedSpecialization']; // Detailed Specialization
$e = $_POST['AppointmentDate']; // Appointment Date
$f = $_POST['InitialRank']; // Initial Rank
$g = $_POST['LastPromotionRank']; // Last Promotion Rank
$h = $_POST['PromotionReason']; // Promotion Reason
$i = $_POST['LastPromotionDate']; // Last Promotion Date

// Handle CV upload (optional)
if (isset($_FILES['CV']) && $_FILES['CV']['error'] === UPLOAD_ERR_OK) {
    $cvData = file_get_contents($_FILES['CV']['tmp_name']); // Store the file content as binary data
    $cvSql = ", CV = :cv"; // Prepare to update CV field
} else {
    $cvData = null;
    $cvSql = ""; // No CV update
}

// Update query with all fields
$sql = "UPDATE customer 
        SET FullName = :a, 
            College = :b, 
            GeneralSpecialization = :c, 
            DetailedSpecialization = :d, 
            AppointmentDate = :e, 
            InitialRank = :f, 
            LastPromotionRank = :g, 
            PromotionReason = :h, 
            LastPromotionDate = :i
            $cvSql
        WHERE customer_id = :id";

// Prepare and execute the query
$q = $db->prepare($sql);
$q->execute(array(
    ':a' => $a,
    ':b' => $b,
    ':c' => $c,
    ':d' => $d,
    ':e' => $e,
    ':f' => $f,
    ':g' => $g,
    ':h' => $h,
    ':i' => $i,
    ':id' => $id,
    ':cv' => $cvData // If CV is uploaded, update it
));

// Redirect back to the customer page
header("location: customer.php");
?>
