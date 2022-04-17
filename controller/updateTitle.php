<?php
$title = $_POST['title'];
$url = strtolower(str_replace(' ', '-',trim($title)));
$id = $_POST['id-form'];

if (isset($_POST['submit'])) {
    include_once('../model/model.php');
    $db = new Database();
    $db->updateCtTitle($id, $title, $url);
}
?>