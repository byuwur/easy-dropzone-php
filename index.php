<?php
// This script serves a simple interface for uploading a single file using Dropzone.js
// The file will be saved with the name provided via the "id" GET parameter

// Check if the "id" GET parameter is set and valid
if (!isset($_GET["id"])) die("Please send an ID through a GET request.");
if (empty($_GET["id"])) die("Please input a valid ID.");

// Trim any whitespace from the ID
$id = trim($_GET["id"]);
?>
<!-- Include Dropzone.js CSS -->
<link rel="stylesheet" href="dropzone/dropzone.min.css" />
<!-- Include Dropzone.js JavaScript -->
<script src="dropzone/dropzone.min.js"></script>

<h1>SINGLE FILE DROPZONE</h1>
<p>ID (also serves as filename) = <b><?= $id; ?></b></p>
<p>The <b>files</b> will be uploaded to a folder named "files/" next to this index.php file. Go check it out!</p>
<p style="color:crimson;">*The <b>image</b> must have a maximum size of <b>one (1) megabyte</b>.</p>

<!-- Dropzone form for file upload -->
<form id="myDZ" class="dropzone" action="upload.php">
    <!-- Hidden input to pass the filename (ID) to the upload script -->
	<input type="hidden" name="filename" value="<?= $id; ?>" />
</form>

<p>The <b>image</b> will be automatically uploaded once selected.</p>
<p>This was the implementation object, use it wisely:<br>
<code>let myDZ = new Dropzone("#myDZ", { acceptedFiles: "image/jpeg", maxFileSize: 1, parallelUploads: 1, paramName: "myFile", resizeWidth: 100, resizeHeight: 100, resizeMimeType: "image/jpeg", resizeQuality: 0.75, resizeMethod: "contain" });</code>
</p>

<script>
    // Disable auto-discovery of Dropzone.js instances to allow manual initialization
	Dropzone.autoDiscover = false;

    // Initialize Dropzone with custom options
	const myDZ = new Dropzone("#myDZ", {
		acceptedFiles: "image/jpeg",  // Only allow JPEG files
		maxFileSize: 1,               // Limit file size to 1 MB
		parallelUploads: 1,           // Allow only one file to be uploaded at a time
		paramName: "myFile",          // Name of the file input in the request
		resizeWidth: 256,             // Resize image width to 256 pixels
		resizeHeight: 256,            // Resize image height to 256 pixels
		resizeMimeType: "image/jpeg", // Maintain JPEG format
		resizeQuality: 0.5,           // Set image quality to 50%
		resizeMethod: "contain"       // Use "contain" resize method to fit within dimensions
	});
</script>
