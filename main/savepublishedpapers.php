<?php
session_start();
include('../connect.php');

// ������ �������� �� �������
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];
$title = $_POST['Title'];
$doi = $_POST['DOI'];
$link = $_POST['Link'];
$publisher = $_POST['Publisher'];
$publishDate = $_POST['PublishDate'];

// ������ �� ��� ��� ������ �������
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
$sql = "INSERT INTO publishedpapers (
            Title, DOI, Link, Publisher, PublishDate, PaperFile,UserId
        ) 
        VALUES (
            :title, :doi, :link, :publisher, :publishDate, :paperFile, :userId
        )";

$q = $db->prepare($sql);
$q->execute(array(
    ':title' => $title,
    ':doi' => $doi,
    ':link' => $link,
    ':publisher' => $publisher,
    ':publishDate' => $publishDate,
    ':paperFile' => $paperFileData ,
       'userId'=>   $userId
));

// ����� ������� ��� ���� �������
header("location: publishedpapers.php");
?>
