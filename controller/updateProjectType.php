<?php
    include_once('../model/model.php');
    $db = new Database();

    $id = $_POST['id'];
    $projectType = $_POST['projectType'];

    $cnt = $db->updateCtType($id, $projectType);
?>