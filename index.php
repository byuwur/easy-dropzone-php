<?php
// This script serves a simple interface for uploading a single file using Dropzone.js
// The file will be saved with the name provided via the "id" GET parameter

// Check if the "id" GET parameter is set and valid
if (!isset($_GET["id"]))
  $_GET["id"] = "test";
if (!is_string($_GET["id"]))
  die("Please input a valid ID.");
// Trim any whitespace from the ID
$id = trim($_GET["id"]);
// Allow only characters that are safe to use in a filename
if ($id === "" || !preg_match('/\A[A-Za-z0-9_-]{1,64}\z/', $id))
  die("Please input a valid ID.");
// Escape the ID before rendering it into HTML
$safe_id = htmlspecialchars($id, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
?>
<!-- Include Dropzone.js CSS -->
<link rel="stylesheet" href="dropzone/dropzone.min.css" />
<!-- Include Dropzone.js JavaScript -->
<script src="dropzone/dropzone.min.js"></script>

<h1>SINGLE FILE DROPZONE</h1>
<p>ID (also serves as filename) = <b><?= $safe_id; ?></b></p>
<p>The <b>file</b> will be uploaded to a folder named "files/" next to this index.php file. Go check it out!</p>
<p style="color:crimson;">*The <b>image</b> must have a maximum size of <b>four (4) megabytes</b>.</p>
<p style="color:crimson;">*The <b>image</b> must be a <b>JPEG or PNG</b> format.</p>

<!-- Dropzone form for file upload -->
<form id="myDZ" class="dropzone" action="upload.php">
  <!-- Hidden input to pass the filename (ID) to the upload script -->
  <input type="hidden" name="filename" value="<?= $safe_id; ?>" />
</form>

<p>The <b>image</b> will be automatically uploaded once selected.</p>
<p>This was the implementation object, use it wisely:<br>
  <code>const myDZ = new Dropzone("#myDZ", { acceptedFiles: "image/jpeg,image/png", maxFilesize: 4, maxFiles: 1, parallelUploads: 1, paramName: "myFile", resizeWidth: 256, resizeHeight: 256, resizeQuality: 0.5, resizeMethod: "contain" });</code>
</p>

<script>
  // Disable auto-discovery of Dropzone.js instances to allow manual initialization
  Dropzone.autoDiscover = false;
  // Initialize Dropzone with custom options
  const myDZ = new Dropzone("#myDZ", {
    acceptedFiles: "image/jpeg,image/png", // Only allow JPEG and PNG files
    maxFilesize: 4, // Limit file size to 4MB
    maxFiles: 1, // Allow only one file in the Dropzone
    parallelUploads: 1, // Upload only one file at a time
    paramName: "myFile", // Name of the file input in the request
    resizeWidth: 256, // Resize image width to fit within 256 pixels
    resizeHeight: 256, // Resize image height to fit within 256 pixels
    resizeQuality: 0.5, // Set image quality to 50%
    resizeMethod: "contain" // Fit the image within the configured dimensions
  });
</script>