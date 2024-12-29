<?php
session_start();
include('../connect.php');

// ÇÓÊáÇã ÇáÈíÇäÇÊ ãä ÇáäãæÐÌ
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];
$title = $_POST['Title'];
$doi = $_POST['DOI'];
$link = $_POST['Link'];
$publisher = $_POST['Publisher'];
$publishDate = $_POST['PublishDate'];

// ÇáÊÍÞÞ ãä ÑÝÚ ãáÝ ÇáæÑÞÉ ÇáÚáãíÉ
if (isset($_FILES['PaperFile']) && $_FILES['PaperFile']['error'] === UPLOAD_ERR_OK) {
    // ÞÑÇÁÉ ãÍÊæì ÇáãáÝ ßÈíÇäÇÊ ËäÇÆíÉ
    $paperFileData = file_get_contents($_FILES['PaperFile']['tmp_name']);
} else {
    die("Error: No file uploaded or an error occurred.");
}
}else {
 die("Error: Please log in to view your details");
}

// ÅÏÎÇá ÇáÈíÇäÇÊ Ýí ÞÇÚÏÉ ÇáÈíÇäÇÊ
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

// ÅÚÇÏÉ ÇáÊæÌíå Åáì ÕÝÍÉ ÇáÃæÑÇÞ
header("location: publishedpapers.php");
?>
