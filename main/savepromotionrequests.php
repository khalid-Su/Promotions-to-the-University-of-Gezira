<?php
session_start();
include('../connect.php');


if (isset($_SESSION['SESS_MEMBER_ID'])) {
$userId = $_SESSION['SESS_MEMBER_ID'];
$targetRank = $_POST['TargetRank'];
$targetSpecialization = $_POST['TargetSpecialization'];

if (isset($_FILES['MasterSummaryArabic']) && $_FILES['MasterSummaryArabic']['error'] === UPLOAD_ERR_OK) {
    $masterSummaryArabicData = file_get_contents($_FILES['MasterSummaryArabic']['tmp_name']);
} else {
    $masterSummaryArabicData = null;
}

// ������ �� ��� ���� ��������� (�������)
if (isset($_FILES['MasterSummaryEnglish']) && $_FILES['MasterSummaryEnglish']['error'] === UPLOAD_ERR_OK) {
    $masterSummaryEnglishData = file_get_contents($_FILES['MasterSummaryEnglish']['tmp_name']);
} else {
    $masterSummaryEnglishData = null;
}


if (isset($_FILES['PhDStudySummaryArabic']) && $_FILES['PhDStudySummaryArabic']['error'] === UPLOAD_ERR_OK) {
    $phdStudySummaryArabicData = file_get_contents($_FILES['PhDStudySummaryArabic']['tmp_name']);
} else {
    $phdStudySummaryArabicData = null;
}

// ������ �� ��� ���� ����� ��������� (�������)
if (isset($_FILES['PhDStudySummaryEnglish']) && $_FILES['PhDStudySummaryEnglish']['error'] === UPLOAD_ERR_OK) {
    $phdStudySummaryEnglishData = file_get_contents($_FILES['PhDStudySummaryEnglish']['tmp_name']);
} else {
    $phdStudySummaryEnglishData = null;
}
}else {
 die("Error: Please log in to view your details");
}
// ����� �������� �� ����� ��������
$sql = "INSERT INTO promotionrequests (
            TargetRank, TargetSpecialization, 
            MasterSummaryArabic, MasterSummaryEnglish, 
            PhDStudySummaryArabic, PhDStudySummaryEnglish,UserId
        ) 
        VALUES (
            :targetRank, :targetSpecialization, 
            :masterSummaryArabic, :masterSummaryEnglish, 
            :phdStudySummaryArabic, :phdStudySummaryEnglish , :userId
        )";

$q = $db->prepare($sql);
$q->execute(array(
    ':targetRank' => $targetRank,
    ':targetSpecialization' => $targetSpecialization,
    ':masterSummaryArabic' => $masterSummaryArabicData, 
    ':masterSummaryEnglish' => $masterSummaryEnglishData,
    ':phdStudySummaryArabic' => $phdStudySummaryArabicData,
    ':phdStudySummaryEnglish' => $phdStudySummaryEnglishData,
    'userId'=> $userId
  ));

// ����� ������� ��� ���� �������
header("location: promotionrequests.php");
?>
