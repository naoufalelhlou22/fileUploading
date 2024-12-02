<?php
// Define allowed file extensions for image uploads
const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif'];

// Define the maximum upload size (in bytes). 1 MB = 1,000,000 bytes.
const MAX_UPLOADING_SIZE = 1000000;

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    uploadFileHandel(); // Process the uploaded file
} else {
    // Redirect to index.php if the request method is not POST
    header('location: index.php');
    return;
}

// Function to handle file upload
function uploadFileHandel() : void
{
    $uploadedImage = $_FILES['image'];
    // Check if a file was uploaded and the input field is not empty
    if (!isset($uploadedImage) /*|| empty($uploadedImage['name'])*/) {
        // Log an error if no file is uploaded or the file is too large
        error_log("User tried to upload a file without choosing or with a large size\n", 3, 'error.log');
        // Redirect back to the form
        header('location: index.php');
        die;
    }

    // Retrieve the uploaded file information
    $uploadingError = $uploadedImage['error']; // Error code from the file upload
    $imageName = $uploadedImage['name']; // Original file name

    // Check for any upload errors
    if (checkUploadingError($uploadingError)) {
        showMessage("Please chose an image"); // Show an error message
        die;
    }

    // Extract the file extension from the uploaded file's name
    $fileExtension = pathinfo($imageName)['extension'];

    // Validate the file extension against allowed extensions
    if (!checkFileExtension($fileExtension)) {
        showMessage("Your image extension is not supported. Try jpg, jpeg, gif, or png."); // Show error
        die;
    }

    // Get the size of the uploaded file
    $imageSize = $uploadedImage['size'];

    // Check if the file size exceeds the maximum allowed size
    if (checkImageSize($imageSize)) {
        showMessage("Your image is too big! Max upload size is 1 MB."); // Show error
        die;
    }

    // Save the uploaded file to the server
    saveImage($fileExtension);
}

// Function to check if there was an upload error
function checkUploadingError($error) : bool
{
    // Return true if there is an error (error code not 0 means an issue)
    return ($error === 4);
}

// Function to check if the file size exceeds the allowed limit
function checkImageSize($size) : bool
{
    // Return true if the file size is greater than the maximum allowed size
    return ($size > MAX_UPLOADING_SIZE);
}

// Function to validate the file extension
function checkFileExtension($fileExtension) : bool
{
    // Return true if the file extension is in the list of allowed extensions
    return in_array($fileExtension, ALLOWED_EXTENSIONS);
}

// Function to save the uploaded file
function saveImage($fileExtension) : void
{
    // Generate a unique name for the file to avoid conflicts
    $newImageName = uniqid('', false) . '.' . $fileExtension;

    // Define the destination directory for uploaded files
    $destination = 'uploads/';
    $tmpName = $_FILES['image']['tmp_name']; // Temporary file path

    // Create the destination directory if it doesn't exist
    if (!file_exists($destination)) {
        mkdir($destination, '0777', true); // Create with full permissions
    }

    // Move the uploaded file from the temporary directory to the destination
    move_uploaded_file($tmpName, $destination . $newImageName);

    // Show a success message
    showMessage("Your file has been uploaded successfully.");
    die;
}

// Function to display a message to the user
function showMessage($message)
{
    // Display an alert with the message and redirect back to the form
    echo "<script>alert('$message'); window.location.href = 'index.php';</script>";
    die;
}