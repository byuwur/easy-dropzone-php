<?php
if (isset($_GET["id"])) {
	if (!empty($_GET["id"])) {
		$id = trim($_GET["id"]);		// Delete whitespaces
		$id = strip_tags($id);			// Delete HTML and PHP tags
		$id = htmlspecialchars($id);	// Declares HTML tags
?>
<div class="row">
	<link rel="stylesheet" href="dropzone/dropzone.min.css" />
	<p style="color:#f44">*The <b>image</b> must have a maximum size of <b>-X- megabytes</b>.</p>
	<form action="upload.php" method="POST" class="dropzone" id="dropzoneID" name="dropzoneID">
		<input type="hidden" id="id" name="id" value="<?= $id ?>" />
	</form>
	<p>The <b>image</b> will be automatically uploaded once selected.</p>
	<script src="dropzone/dropzone.min.js"></script>
	<!-- SETTINGS -->
	<script>
	Dropzone.options.dropzoneID = {
		maxFileSize: 5,	/* None max size if not declared */
		acceptedFiles: "image/jpeg",	/* All files admitted if not declared */
		init: function init() { this.on("error", function() {
			alert("An ERROR occurred uploading the file.");
		}); }
	}
	</script>
	<!-- END SETTINGS -->
	<!-- GO TO https://www.dropzonejs.com/ TO LEARN MORE -->
</div>
<?php
	} else echo "Set a valid ID.";
} else echo "Set an ID";
?>