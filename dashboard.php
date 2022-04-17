<?php
    // check creds
    include_once('./controller/verify.php');

    include_once('model/model.php');
    $db = new Database();
    $titles = $db->getTitles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('components/head.php'); ?>
    <title>Dylan Weijgertze | Dashboard</title>
</head>
<body id="DS">
    <?php include_once('components/nav.php'); ?>

    <div class="sm-container dashboard">
        <header>
            <h1>Dashboard<i class="bi bi-plus-circle" id="new-page"></i></h1>
            
        </header>
        <div id="dash-img"></div>
        <br>
        <?php foreach ($titles as $title) { ?>
            <a href="edit/<?php print($title['url']); ?>" class="page-item<?php if ($title['published'] !== '1') print(' not-published'); ?>"><i class="bi bi-pencil-square"></i> <?php print(ucwords($title['title'])); ?></a>
        <?php } ?>
    </div>

    <?php include_once('components/footer.php'); ?>
    <script src="./js/dashboard.js"></script>
</body>
</html>