<?php
session_start();
include('../connect.php');
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];
// ������ �������� �� �������
$title = $_POST['Title'];
$bookType = $_POST['BookType'];
$bookDate = $_POST['BookDate'];
$publisher = $_POST['Publisher'];

// ������ �� ��� ��� ������
if (isset($_FILES['BookFile']) && $_FILES['BookFile']['error'] === UPLOAD_ERR_OK) {
    // ����� ����� ����� ������� ������
    $bookFileData = file_get_contents($_FILES['BookFile']['tmp_name']);
} else {
    die("Error: No file uploaded or an error occurred.");
}
}else {
 die("Error: Please log in to view your details");
}

// ����� �������� �� ����� ��������
$sql = "INSERT INTO publishedbook (
            Title, BookType, BookDate, Publisher, BookFile,UserId
        ) 
        VALUES (
            :title, :bookType, :bookDate, :publisher, :bookFile,:userId
        )";

$q = $db->prepare($sql);
$q->execute(array(
    ':title' => $title,
    ':bookType' => $bookType,
    ':bookDate' => $bookDate,
    ':publisher' => $publisher,
    ':bookFile' => $bookFileData ,
    'userId'=>   $userId
));

// ����� ������� ��� ���� �����
header("location: publishedbook.php");
?>
