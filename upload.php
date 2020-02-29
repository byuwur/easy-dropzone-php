<?php
if (isset($_POST["id"])) {
	if (!empty($_POST["id"])) {
		$id = trim($_POST["id"]);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);
		mkdir("files/");
		move_uploaded_file($_FILES['file']['tmp_name'], "files/" . $id . ".jpg");
	}
}
?>