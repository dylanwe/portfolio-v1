<?php
include_once('model/model.php');
$db = new Database();
$cnt = $db->getPage($name);
$cnt = $cnt[0];
include_once('view/contentView.php');
?>