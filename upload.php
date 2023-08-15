<?php
if (!isset($_POST["filename"])) exit;
if (empty($_POST["filename"])) exit;
if (empty($_FILES)) exit;
$id = trim($_POST["filename"]);
$id = strip_tags($id);
$id = htmlspecialchars($id);
$filename_arr = explode(".", $_FILES['myFile']['name']);
if (!is_dir("files/")) mkdir("files/");
move_uploaded_file($_FILES['myFile']['tmp_name'], "files/" . $id . "." . end($filename_arr));
exit;