<?php

session_start();
include('../connect.php');

// تحقق من تسجيل الدخول
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $userId = $_SESSION['SESS_MEMBER_ID'];

    // استلام البيانات من النموذج
    $contributionsType = $_POST['ContributionsType'];
  
    if (isset($_FILES['certificationfile']) && $_FILES['certificationfile']['error'] === UPLOAD_ERR_OK) {
        // قراءة محتوى الملف
        $certificationFileData = file_get_contents($_FILES['certificationfile']['tmp_name']);
    } else {
        die("Error: No file uploaded or an error occurred.");
    }
} else {
    die("Error: Please log in to view your details");
}

// إدخال البيانات إلى قاعدة البيانات
$sql = "INSERT INTO  contributions (
            ContributionsType,  UserId, certification
        ) 
        VALUES (
            :contributionsType,  :userId, :certificationfile
        )";

$q = $db->prepare($sql);
$q->execute(array(
    ':contributionsType' => $contributionsType,
    ':userId' => $userId,
    ':certificationfile' => $certificationFileData
));

// إعادة التوجيه بعد الإضافة الناجحة
header("location: Contributions.php");
?>
