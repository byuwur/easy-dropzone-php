<?php
if (isset($_POST["id"])) {
	if (!empty($_POST["id"])) {
		mkdir("files/");
		move_uploaded_file($_FILES['file']['tmp_name'], "files/" . $_POST['id'] . ".jpg");
	}
}
?>