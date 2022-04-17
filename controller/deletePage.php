<?php
include_once('../model/model.php');
$db = new Database();

$id = $_POST['id'];

$db->deletePage($id);
?>