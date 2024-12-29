<?php
// Include database connection
include('../connect.php');

// Check if ID is passed
if(isset($_GET['id'])) {
    // Sanitize the input to avoid SQL injection
    $customer_id = intval($_GET['id']);

    // Retrieve the CV binary data from the database
    $stmt = $db->prepare("SELECT certification FROM contributions WHERE id = :customer_id");
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->execute();

    // Check if the customer exists and has a CV
    if ($row = $stmt->fetch()) {
        $cvData = $row['certification'];

        // Check if CV is available
        if (!empty($cvData)) {
            // Send the headers to trigger the download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="contributions_certification.pdf"'); // Change the filename as needed
            header('Content-Length: ' . strlen($cvData));
            
            // Output the file contents
            echo $cvData;
            exit;
        } else {
            // If no CV exists
            echo "CV file not found.";
        }
    } else {
        echo "Customer not found.";
    }
} else {
    echo "No customer ID provided.";
}
?>
