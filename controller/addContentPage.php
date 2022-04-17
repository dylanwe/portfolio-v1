<?php
    include_once('../model/model.php');
    $db = new Database();

    $title = $_POST['title'];
    $content = $_POST['content'];

    $db->updatePage($title, json_encode($content));
?>