<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include_once('model/model.php');
    $db = new Database();
    $skills = $db->getTable('skill_items');
    $projects = $db->getFeatured();
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
<body id="HP">
    <div class="body">
        <?php include_once('./components/nav.php'); ?>
        <div id="blob2"></div>

        <header class="container" id="header">
            <div id="header-wrapper" data-aos="zoom-out" data-aos-duration="1000">
                <div id="icons" class="d-none d-sm-block">
                    <div class="header-icon" id="icon-1"><i class="fab fa-js"></i></div>
                    <div class="header-icon" id="icon-2"><i class="fab fa-html5"></i></div>
                    <div class="header-icon" id="icon-3"><img src="./img/vscode-icon.svg" alt="VS code"></div>
                    <div class="header-icon" id="icon-4"><i class="fab fa-css3-alt"></i></div>
                    <div class="header-icon" id="icon-5"><img src="./img/adobecc-icon.svg" alt="adobe creative cloud"></div>
                    <div class="header-icon" id="icon-6"><i class="fab fa-python"></i></div>
                </div>
                <img src="./img/memoji.png" alt="memoiji of dylan" data-aos="zoom-out" data-aos-duration="800" data-aos-delay="500">
                <p>Hey, ik ben Dylan 👋</p>
                <h1>Een <span id="code">&lt;<span id="code-highlight">Web-developer</span>/></span><br>en Web-designer</h1>
                <a href="#projects">Projecten</a>
                <a href="#about-me" id="design-button">
                    <div class="ball" id="ball-top-left"></div>
                    <div class="ball" id="ball-top-middle"></div>
                    <div class="ball" id="ball-top-right"></div>
                    Over mij
                    <div class="ball" id="ball-bottom-left"></div>
                    <div class="ball" id="ball-bottom-middle"></div>
                    <div class="ball" id="ball-bottom-right"></div>
                </a>
            </div>
            <div id="blob"></div>
        </header>
        

        <main class="spacer" id="about-me">
            <div class="about-me-triangle" id="top-about-me-triangle"></div>
            <div id="middle-about-me">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="circle-container">
                                <div class="circ"><img src="./img/about-me.png" alt="about me memoji" style="width: 100%;height: auto;"></div>
                                <div class="bg-circ"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div id="about-me-txt">
                                <h2>Over mij</h2>
                                <p>Ik ben Dylan Weijgertze web designer / developer in Utrecht, Nederland. Ik heb een passie voor het ontwerpen en coderen van websites.
                                </p>
                            </div>
                        </div>
                        <div class="d-none d-lg-block col-lg-3">
                            <img src="./img/build.png" alt="about me memoji" class="build"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-me-triangle" id="bottom-about-me-triangle"></div>
            <div class="accent-block" id="accent-block-top"></div>
            <div class="accent-block" id="accent-block-bottom"></div>
        </main>

        <section class="container" id="skills">
            <div class="row spacer">
                <div class="col-md-12 col-lg-6">
                    <div class="skills-slider">
                        <?php foreach ($skills as $skill) { ?>
                            <div class="skills-wrapper">
                                <div class="skill-item">
                                    <div class="skill-item-icon"<?php print($skill['icon_color'] !== NULL) ? ' style="color: ' . $skill['icon_color'] . '"' : ''; ?>><?php print($skill['icon']); ?></div>
                                    <div class="skill-item-text">
                                        <h3><?php print($skill['title']); ?></h3>
                                        <p><?php print($skill['category']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6"> 
                    <div id="skills-text">
                        <h2>Skills 🧠</h2>
                        <p>Talen en software waar ik ervaring mee heb en dat terug te zien is in mijn projecten
                            <br><br>
                            <a href="https://dylanwe.com/projects">Bekijk skills in projecten ></a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container" id="projects">
            <div class="row spacer">
                <div class="col-12">
                    <h2>Projecten</h2>
                </div>

                <div id="projects-slider">
                    <?php foreach ($projects as $project) { ?> 
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
                    <?php } ?>
                </div>
            </div>
        </section>
        

        <?php include_once('components/footer.php'); ?>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
        <script src="./js/index.js"></script>
        <script> AOS.init(); </script>
    </div>
</body>
</html>