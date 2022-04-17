<?php
$name = $_GET['name'];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/4.0.0/github-markdown.min.css">
    <link rel="stylesheet" href="https://dylanwe.com/css/one-dark.css">
    <?php include_once('components/head.php'); ?>
    <title>Dylan Weijgertze | <?php print(ucwords($name)); ?></title>
</head>

<body id="CT">
    <?php include_once('components/nav.php'); ?>
    <main class="sm-container">
        <div id="output">
            <?php include_once('./controller/contentInfo.php'); ?>
        </div>
    </main>

    <?php include_once('components/footer.php'); ?>
    <script src="https://dylanwe.com/js/content.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-ROhjG07IRaPZsryG77+MVyx3ZT5q3sGEGENoGItwc9xgvx+dl+s3D8Ob1zPdbl/iKklMKp7uFemLJFDRw0bvig==" crossorigin="anonymous"></script>
</body>

</html>