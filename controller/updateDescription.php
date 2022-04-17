<?php
    include_once('../model/model.php');
    $db = new Database();

    $id = $_POST['id'];
    $description = $_POST['description'];

    $cnt = $db->updateCtDescription($id, $description);
?>