<?php
// This script handles the file upload from the Dropzone.js form
header("Content-Type: text/plain; charset=UTF-8");
// Return an HTTP error that Dropzone can recognize as a failed upload
function fail_upload($status, $message)
{
  http_response_code($status);
  exit($message);
}
// Only accept POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST")
  fail_upload(405, "Method not allowed.");
// Check if the "filename" POST parameter is set and valid
if (!isset($_POST["filename"]) || !is_string($_POST["filename"]))
  fail_upload(400, "Please provide a valid filename.");
// Get the file name
$id = trim($_POST["filename"]);
// Allow only characters that are safe to use in a filename
if ($id === "" || !preg_match('/\A[A-Za-z0-9_-]{1,64}\z/', $id))
  fail_upload(400, "Please provide a valid filename.");
// Check if the expected file was uploaded
if (!isset($_FILES["myFile"]) || !is_array($_FILES["myFile"]))
  fail_upload(400, "No file was uploaded.");
// Get the file binaries
$file = $_FILES["myFile"];
// Reject malformed or failed uploads
if (!isset($file["error"]) || is_array($file["error"]))
  fail_upload(400, "Invalid upload.");
if ($file["error"] === UPLOAD_ERR_INI_SIZE || $file["error"] === UPLOAD_ERR_FORM_SIZE)
  fail_upload(413, "The file exceeds the maximum allowed size.");
if ($file["error"] !== UPLOAD_ERR_OK)
  fail_upload(400, "The upload failed.");
if (!isset($file["tmp_name"], $file["size"]) || !is_string($file["tmp_name"]))
  fail_upload(400, "Invalid upload.");
// Enforce the 1 MB limit on the server as well
$size_limit = 4;
$size_max = 1024 * 1024 * $size_limit; // 4MB
if ($file["size"] <= 0 || $file["size"] > $size_max)
  fail_upload(413, "The file exceeds the {$size_limit}MB limit.");
// Verify that PHP actually received this file through an HTTP upload
if (!is_uploaded_file($file["tmp_name"]))
  fail_upload(400, "Invalid upload.");
// Validate the actual file type instead of trusting the original filename or browser MIME type
$finfo = new finfo(FILEINFO_MIME_TYPE);
if ($finfo->file($file["tmp_name"]) !== "image/jpeg") {
  fail_upload(415, "Only JPEG images are allowed.");
}
// Check if the "files/" directory exists, if not, create it
$directory = __DIR__ . DIRECTORY_SEPARATOR . "files";
if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
  fail_upload(500, "Unable to create the upload directory.");
}
// Store every accepted upload with a fixed .jpg extension
$destination = $directory . DIRECTORY_SEPARATOR . $id . ".jpg";
if (!move_uploaded_file($file["tmp_name"], $destination)) {
  fail_upload(500, "Unable to save the uploaded file.");
}

exit("Upload successful.");