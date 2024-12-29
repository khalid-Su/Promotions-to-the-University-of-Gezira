<?php
session_start();
include('../connect.php');
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];
// ������ �������� �� �������
$title = $_POST['Title'];
$conferenceName = $_POST['ConferenceName'];

$paperDate = $_POST['PaperDate'];
$workchLocation = $_POST['WorkchLocation'];


// ������ �� ��� ��� ������
if (isset($_FILES['PaperFile']) && $_FILES['PaperFile']['error'] === UPLOAD_ERR_OK) {
    // ����� ����� ����� ������� ������
    $paperFileData = file_get_contents($_FILES['PaperFile']['tmp_name']);
} else {
    die("Error: No file uploaded or an error occurred.");
}
}else {
 die("Error: Please log in to view your details");
}

// ����� �������� �� ����� ��������
$sql = "INSERT INTO wpepers (
            Title, ConferenceName, PaperDate, WorkchLocation, PaperFile,UserId
        ) 
        VALUES (
            :title, :conferenceName, :paperDate, :workchLocation, :paperFile ,:userId
          
        )";

$q = $db->prepare($sql);
$q->execute(array(
    ':title' => $title,
    ':conferenceName' => $conferenceName,
    
    ':paperDate' => $paperDate,
    ':workchLocation' => $workchLocation,

    ':paperFile' => $paperFileData ,
    'userId'=>   $userId
    
));

// ����� ������� ��� ���� �������
header("location: wpepers.php");
?>
