<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="https://dylanwe.com/"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="https://dylanwe.com/index.php#HP">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="https://dylanwe.com/index.php#about-me">Over mij</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="https://dylanwe.com/projects">Projecten</a>
                </li>
            </ul>
            <?php
                
                if (isset($_SESSION["password"])) { ?>
                    <form class="form-inline my-2 my-lg-0" action="https://dylanwe.com/controller/logout.php">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="https://dylanwe.com/dashboard.php"><i class="bi bi-speedometer"></i></a>
                            </li>
                            <?php if (isset($name)) { ?>
                                <div class="edit-button">
                                    <a href="https://dylanwe.com/edit/<?php print($name); ?>"><i class="bi bi-pencil"></i></a>
                                </div>
                            <?php } ?>

                        </ul>
                        <button class="btn my-2 my-sm-0" type="submit"><i class="bi bi-box-arrow-in-right"></i></button>
                    </form>
                <?php } ?>
        </div>
    </div>
    <div id="progress"></div>
</nav>