<?php
session_start();
include('../connect.php');
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];
// ������ �������� �� �������
$title = $_POST['Title'];
$paperType = $_POST['paperType'];
$paperDate = $_POST['PaperDate'];
$link = $_POST['Link'];

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
$sql = "INSERT INTO pepersss (
            Title, paperType, PaperDate, Link, PaperFile,UserId
        ) 
        VALUES (
            :title, :paperType, :paperDate, :link, :paperFile,:userId
        )";

$q = $db->prepare($sql);
$q->execute(array(
    ':title' => $title,
    ':paperType' => $paperType,
    ':paperDate' => $paperDate,
    ':link' => $link,
    ':paperFile' => $paperFileData ,
    'userId'=>   $userId
));

// ����� ������� ��� ���� �������
header("location: pepersss.php");
?>
