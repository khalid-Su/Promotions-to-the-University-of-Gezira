<?php
// Include database connection
include('../connect.php');

// Check if ID is passed
if(isset($_GET['id'])) {
    // Sanitize the input to avoid SQL injection
    $customer_id = intval($_GET['id']);

    // Retrieve the CV binary data from the database
    $stmt = $db->prepare("SELECT BookFile FROM publishedbook WHERE id = :customer_id");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->execute();

    // Check if the customer exists and has a CV
    if ($row = $stmt->fetch()) {
        $cvData = $row['BookFile'];

        // Check if CV is available
        if (!empty($cvData)) {
            // Send the headers to trigger the download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="published_book.pdf"'); // Change the filename as needed
            header('Content-Length: ' . strlen($cvData));
            
            // Output the file contents
            echo $cvData;
            exit;
        } else {
            // If no CV exists
            echo "publishedbook file not found.";
        }
    } else {
        echo "book not found.";
    }
} else {
    echo "No book ID provided.";
}
?>
