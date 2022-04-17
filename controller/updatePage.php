<?php
    include_once('../model/model.php');
    $db = new Database();

    $id = $_POST['id'];
    $content = $_POST['content'];

    $db->updatePage($id, json_encode($content));
?>