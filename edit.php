<?php
    // check creds
    include_once('./controller/verify.php');
    
    $name = $_GET['name'];
    include_once('model/model.php');
    $db = new Database();
    $cnt = $db->getPage($name);
    $cnt = $cnt[0];

    $directory = "uploads";
    $images = glob($directory . "/*");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/4.0.0/github-markdown.min.css">
    <link rel="stylesheet" href="https://dylanwe.com/css/one-dark.css">
    <?php include_once('components/head.php'); ?>
    <script src="https://dylanwe.com/ckeditor/ckeditor.js"></script>
    <title>Dylan Weijgertze edit | <?php print(ucwords($name)); ?></title>
</head>
<body id="ED">
    <div id="img-container">
        <div id="img-wrapper">
            <form id="upload-form" action="https://dylanwe.com/controller/uploadImage.php" method="POST"  enctype="multipart/form-data">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="chosen-img" name="file" accept="image/*" required>
                    <label class="custom-file-label" id="label-chosen" for="chosen-img">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                <button id="submit-img" class="btn btn-primary">Upload</button>
            </form>
            <div id="img-list">
                <div class="row">
                    <?php foreach($images as $image) { ?>
                        <div class="col-sm-6 col-lg-4 col-xl-2">
                            <div class="img">
                                <img src="<?php print("https://dylanwe.com/$image"); ?>" data-toggle="tooltip" data-placement="top" title="Copy">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="black-bg"></div>
    </div>

    <?php include_once('components/nav.php'); ?>
    <main>
        <div class="sm-container">
            <div class="d-none" id="id"><?php print($cnt['id']); ?></div>
            <form action="../controller/updateTitle.php" method="POST">
                <input class="d-none" id="id-form" name="id-form" type="text" value="<?php print($cnt['id']); ?>">
                <div class="form-group">
                    <label for="project-title">Project title</label>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Project title" name="title" id="project-title" value="<?php print($cnt['title']); ?>">
                    <div class="input-group-append">
                        <input class="btn btn-outline-secondary main-button" type="submit" name="submit" value="Submit">
                    </div>
                </div>
            </form>
            </div>
            <div class="form-group">
                <label for="project-type">Project type</label>
                <input type="text" class="form-control" placeholder="Project type" id="project-type" value="<?php print($cnt['project_type']); ?>">
            </div>
            <div class="form-group">
                <label for="description">Project description</label>
                <input type="text" class="form-control" placeholder="Project description" id="description" value="<?php print($cnt['description']); ?>">
            </div>
            <div class="form-group">
                <label for="header-img">Project image</label>
                <input type="text" class="form-control" placeholder="Project img URL" id="header-img" value="<?php print($cnt['project_img']); ?>">
            </div>
            <div class="row">
                <div class="col-6 col-sm-2">
                    <label for="header-img">Published</label> <br>
                    <label class="switch">
                        <?php if ($cnt['published'] === '1') {
                            print('<input type="checkbox" id="published" checked>');
                        } else {
                            print('<input type="checkbox" id="published">');
                        } ?>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="col-6 col-sm-2">
                    <label for="header-img">Featured</label> <br>
                    <label class="switch">
                        <?php if ($cnt['featured'] === '1') {
                            print('<input type="checkbox" id="featured" checked>');
                        } else {
                            print('<input type="checkbox" id="featured">');
                        } ?>
                        <span class="slider round" id="featured-toggle"></span>
                    </label>
                </div>
            </div>
            <br>
        </div>
        <input type="hidden" id="title" value="<?php print($name); ?>">
        <div id="myForm">
            <button id="img-button"><i class="far fa-images"></i></button>
            <textarea name="editor1" id="editor1" style="display:none">
                <?php print_r(json_decode($cnt['content'])); ?>
            </textarea>
            <br>
        </div> 
    </main>
    <section class="sm-container">
        <div id="ct-img">
            <img src="<?php print($cnt['project_img']); ?>" class="img-fluid" alt="header img" id="preview-header">
        </div>
        <br><br>
        <h1><?php print($cnt['title']); ?></h1>
        <div id="info">
        <div id="avatar"></div>
            <div id="info-wrapper">
                <div class="author"><?php print($cnt['author']); ?></div>
                <div><?php print(substr($cnt['date'], 0, 10)); ?></div>
            </div>
        </div>
        <div id="output" class="markdown-body">
            <?php print_r(json_decode($cnt['content'])); ?>
        </div>
        <button type="button" class="btn btn-red-sec" id="delete-page"><i class="bi bi-trash-fill"></i> Delete page</button>
    </section>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-ROhjG07IRaPZsryG77+MVyx3ZT5q3sGEGENoGItwc9xgvx+dl+s3D8Ob1zPdbl/iKklMKp7uFemLJFDRw0bvig==" crossorigin="anonymous"></script>
    <?php include_once('components/footer.php'); ?>
    <script src="https://dylanwe.com/js/edit.js"></script>
</body>
</html>