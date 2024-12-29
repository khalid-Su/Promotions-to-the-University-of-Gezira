<?php
session_start();
include('../connect.php');

if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];

$fullName = $_POST['FullName'];
$college = $_POST['College'];
$generalSpecialization = $_POST['GeneralSpecialization'];
$detailedSpecialization = $_POST['DetailedSpecialization'];
$appointmentDate = $_POST['AppointmentDate'];
$initialRank = $_POST['InitialRank'];
$lastPromotionRank = $_POST['LastPromotionRank'];
$promotionReason = $_POST['PromotionReason'];
$lastPromotionDate = $_POST['LastPromotionDate'];
if (isset($_FILES['CV1']) && $_FILES['CV1']['error'] === UPLOAD_ERR_OK) {
    // ����� ����� ����� ������� ������
    $cvData = file_get_contents($_FILES['CV1']['tmp_name']);
} else {
    die("Error: No CV file uploaded or an error occurred.");
}
}else {
 die("Error: Please log in to view your details");
}


$sql = "INSERT INTO customer (
            FullName, College, GeneralSpecialization, DetailedSpecialization, 
            AppointmentDate, InitialRank, LastPromotionRank, PromotionReason, 
            LastPromotionDate, CV,UserId
        ) 
        VALUES (
            :fullName, :college, :generalSpecialization, :detailedSpecialization, 
            :appointmentDate, :initialRank, :lastPromotionRank, :promotionReason, 
            :lastPromotionDate, :cv,:userId
        )";

$q = $db->prepare($sql);
$q->execute(array(
    ':fullName' => $fullName,
    ':college' => $college,
    ':generalSpecialization' => $generalSpecialization,
    ':detailedSpecialization' => $detailedSpecialization,
    ':appointmentDate' => $appointmentDate,
    ':initialRank' => $initialRank,
    ':lastPromotionRank' => $lastPromotionRank,
    ':promotionReason' => $promotionReason,
    ':lastPromotionDate' => $lastPromotionDate,
    ':cv' => $cvData,
    'userId'=>   $userId// ����� �������� �������� ������ �������
));

// ����� ������� ��� ���� �������
header("location: customer.php");
?>
