<?php
    session_start();
    if (isset($_GET['error'])) {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('components/head.php'); ?>
    <title>Stage 4 | login</title>
</head>

<body id="LG">
    <?php include_once('components/nav.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div id="lg-img">
                </div>
            </div>
            <div class="col-7">
                <form action="./controller/login.php" method="POST" class="login-page sm-container">
                    <h2>Login to edit pages</h2>
                    <hr>
                    <h6>Username</h6>
                    <input type="text" class="form-control" id="validationDefaultUsername"
                            aria-describedby="inputGroupPrepend2" name="username" required>
                    <br>
                    <h6>Password</h6>
                    <input type="password" class="form-control" name="password">
                    <br>
                    <?php
                        if (isset($_GET['error'])) { ?>

                    <div class="invalid-feedback" style="display: block; margin-bottom: 20px;">
                        Username or password is wrong.
                    </div>
                    <?php }
                    ?>

                    <input type="submit" name="submit" value="Login" class="button btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <?php include_once('components/footer.php'); ?>
</body>

</html>