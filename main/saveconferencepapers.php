<?php
session_start();
include('../connect.php');

// ������ �������� �� �������
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];
$title = filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_STRING);
$conferenceName = filter_input(INPUT_POST, 'ConferenceName', FILTER_SANITIZE_STRING);
$conferenceDate = filter_input(INPUT_POST, 'ConferenceDate', FILTER_SANITIZE_STRING);
$conferenceLocation = filter_input(INPUT_POST, 'ConferenceLocation', FILTER_SANITIZE_STRING);

// ������ �� ��� �������
$certificateFile = null;
if (isset($_FILES['CertificateFile']) && $_FILES['CertificateFile']['error'] === UPLOAD_ERR_OK) {
    // ����� ����� ����� ������� ������
    $certificateFile = file_get_contents($_FILES['CertificateFile']['tmp_name']);
}

$paperFile = null;
if (isset($_FILES['PaperFile']) && $_FILES['PaperFile']['error'] === UPLOAD_ERR_OK) {
    // ����� ����� ����� ������� ������
    $paperFile = file_get_contents($_FILES['PaperFile']['tmp_name']);
}

// ������ �� ��� �������� ��������
if (!$title || !$conferenceName || !$conferenceDate || !$conferenceLocation) {
    die("Error: Missing required fields.");
}
}else {
 die("Error: Please log in to view your details");
}
// ����� �������� �� ����� ��������
try {
    $sql = "INSERT INTO conferencepapers (
                Title, ConferenceName, ConferenceDate, ConferenceLocation, 
                CertificateFile, PaperFile,UserId
            ) 
            VALUES (
                :title, :conferenceName, :conferenceDate, :conferenceLocation, 
                :certificateFile, :paperFile, :userId
            )";

    $q = $db->prepare($sql);
    $q->execute(array(
        ':title' => $title,
        ':conferenceName' => $conferenceName,
        ':conferenceDate' => $conferenceDate,
        ':conferenceLocation' => $conferenceLocation,
        ':certificateFile' => $certificateFile,
        ':paperFile' => $paperFile,
        'userId'=>   $userId
    ));

    // ����� ������� ��� ���� ������� �� ����� ����
    header("location: conferencepapers.php?success=1");
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
