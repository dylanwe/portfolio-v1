<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include_once('model/model.php');
    $db = new Database();
    $projects = $db->getPublishedProjects();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css"/>
    <?php include_once('components/head.php'); ?>
    <title>Dylan Weijgertze</title>
</head>
<body id="PR">
    <div class="body">
        <?php include_once('./components/nav.php'); ?>

        <main id="projects">
            <div class="container">
                <h1>Projects</h1>
                <div class="row">
                    <?php foreach ($projects as $project) { ?>
                        <div class="col-md-6 col-lg-4 project-spacer">
                            <a href="https://dylanwe.com/content/<?php print_r(strtolower($project['url'])); ?>" class="project-wrapper">
                                <div class="project">
                                    <?php if ($project['project_img'] !== '') { ?>
                                        <div class="project-img" style="background-image: url('<?php print_r($project['project_img']); ?>');"></div>
                                    <?php } else { ?>
                                        <div class="project-img"></div>
                                    <?php } ?>
                                    <small><?php print_r($project['project_type']); ?></small>
                                    <h4><?php print_r($project['title']); ?></h4>
                                    <p><?php print_r($project['description']); ?></p>                        
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </main>

        <?php include_once('components/footer.php'); ?>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
        <script> AOS.init(); </script>
    </div>
</body>
</html>