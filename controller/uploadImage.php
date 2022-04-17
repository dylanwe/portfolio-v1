<?php
function uploadFile()
{
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES['file']["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES['file']["size"] > 10000000000) {
        print("error");
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        print("error");
    } else {
        if (move_uploaded_file($_FILES['file']["tmp_name"], "../uploads/$target_file")) {
            $directory = "../uploads";
            $images = glob($directory . "/*"); ?>
                <div class="row">
                        <?php foreach($images as $image) {
                            $image = str_replace('../', '', $image) ?>
                            <div class="col-sm-6 col-lg-4 col-xl-2">
                                <div class="img">
                                    <img src="<?php print("https://dylanwe.com/$image"); ?>" data-toggle="tooltip" data-placement="top" title="Copy">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
        <?php } else {
            print("error");
        }
    }
}
uploadFile();
?>