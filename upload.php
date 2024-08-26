<?php
// This script handles the file upload from the Dropzone.js form

// Check if the "filename" POST parameter is set and valid
if (!isset($_POST["filename"])) exit;   // If no filename is provided, exit the script
if (empty($_POST["filename"])) exit;    // If the filename is empty, exit the script
if (empty($_FILES)) exit;               // If no file is uploaded, exit the script

// Sanitize the filename provided via the POST parameter
$id = trim($_POST["filename"]);         // Remove any surrounding whitespace
$id = strip_tags($id);                  // Remove any HTML tags
$id = htmlspecialchars($id);            // Convert special characters to HTML entities

// Extract the file extension from the uploaded file's original name
$filename_arr = explode(".", $_FILES['myFile']['name']);

// Check if the "files/" directory exists, if not, create it
if (!is_dir("files/")) mkdir("files/");

// Move the uploaded file to the "files/" directory with the sanitized filename and original extension
move_uploaded_file($_FILES['myFile']['tmp_name'], "files/" . $id . "." . end($filename_arr));

// Exit the script after the file has been successfully uploaded
exit;
