<?php
include_once('../model/model.php');
$db = new Database();

$id = $_POST['id'];
$bool = $_POST['bool'];

$cnt = $db->updateCtPublished($id, $bool);
?>