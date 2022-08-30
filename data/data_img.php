<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/data/css/data_img.css">
    <title>INRUT</title>
</head>

<body>
    <?php
    $img1 = "";
    $img2 = "";

    if (isset($_GET["img1"])) {
        $img1 = $_GET["img1"];
    }

    if (isset($_GET["img2"])) {
        $img2 = $_GET["img2"];
    }

    ?>

    <div class="imgbox">
        <img class="img1" src="<?= $img1 ?>" onerror="this.onerror=null; this.src='/img/no_image.jpg';">
        <img class="img2" src="<?= $img2 ?>" onerror="this.onerror=null; this.src='/img/no_image.jpg';">
    </div>

</body>

</html>