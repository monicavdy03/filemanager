<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fileUrl = $_POST["fileUrl"];

    // Validate the URL (you can add more comprehensive validation)
    if (filter_var($fileUrl, FILTER_VALIDATE_URL)) {
        // Get the file extension from the URL
        $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION);

        // Create a unique filename
        $filename = basename($fileUrl);

        // Download the file and save it locally
        file_put_contents($filename, file_get_contents($fileUrl));

        echo "File downloaded and saved as $filename";
    } else {
        echo "Invalid URL. Please enter a valid URL.";
    }
}
?>

