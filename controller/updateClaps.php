<?php
include_once('../model/model.php');
$db = new Database();

$title = $_POST['title'];
$cnt = $db->updateClaps($title);
?>