<?php
if (!isset($_GET["id"])) die("Please send an ID through a GET request.");
if (empty($_GET["id"])) die("Please input a valid ID.");
$id = trim($_GET["id"]);
$id = strip_tags($id);
$id = htmlspecialchars($id);
?>
<link rel="stylesheet" href="dropzone/dropzone.min.css" />
<script src="dropzone/dropzone.min.js"></script>
<h1>SINGLE FILE DROPZONE</h1>
<p>ID (also serves as filename) = <b><?= $id; ?></b></p>
<p>The <b>files</b> will be uploaded to a folder named "files/" next to this index.php file. Go check it out!</p>
<p style="color:crimson;">*The <b>image</b> must have a maximum size of <b>five (1) megabytes</b>.</p>
<form id="myDZ" class="dropzone" action="upload.php">
	<input type="hidden" name="filename" value="<?= $id; ?>" />
</form>
<p>The <b>image</b> will be automatically uploaded once selected.</p>
<p>This was the implementation object, use it wisely:<br><code>let myDZ = new Dropzone("#myDZ", { acceptedFiles: "image/jpeg", maxFileSize: 1, parallelUploads: 1, paramName: "myFile", resizeWidth: 100, resizeHeight: 100, resizeMimeType: "image/jpeg", resizeQuality: 0.75, resizeMethod: "contain" });</code></p>
<script>
	Dropzone.autoDiscover = false;
	let myDZ = new Dropzone("#myDZ", {
		acceptedFiles: "image/jpeg",
		maxFileSize: 1,
		parallelUploads: 1,
		paramName: "myFile",
		resizeWidth: 256,
		resizeHeight: 256,
		resizeMimeType: "image/jpeg",
		resizeQuality: 0.5,
		resizeMethod: "contain"
	});
</script>