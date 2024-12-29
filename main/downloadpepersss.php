<?php
// Include database connection
include('../connect.php');

// Check if ID is passed
if(isset($_GET['id'])) {
    // Sanitize the input to avoid SQL injection
    $customer_id = intval($_GET['id']);

    // Retrieve the CV binary data from the database
    $stmt = $db->prepare("SELECT PaperFile FROM  pepersss  WHERE id = :customer_id");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->execute();

    // Check if the customer exists and has a CV
    if ($row = $stmt->fetch()) {
        $cvData = $row['PaperFile'];

        // Check if CV is available
        if (!empty($cvData)) {
            // Send the headers to trigger the download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="PaperFile.pdf"'); // Change the filename as needed
            header('Content-Length: ' . strlen($cvData));
            
            // Output the file contents
            echo $cvData;
            exit;
        } else {
            // If no CV exists
            echo "PaperFile file not found.";
        }
    } else {
        echo "PaperFile not found.";
    }
} else {
    echo "No PaperFile ID provided.";
}
?>
