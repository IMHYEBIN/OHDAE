<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INRUT</title>
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "server", "00000000", "dataset");

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $blood_type = $_POST['blood_type'];
    $hair_type1 = $_POST['hair_type1'];
    $hair_type2 = $_POST['hair_type2'];
    $hair_type3 = $_POST['hair_type3_1'] . "" . $_POST['hair_type3_2'];
    $skin_type = $_POST['skin_type'];
    $acc = $_POST['acc'];
    $img1 = $_POST['img1'];
    $img2 = $_POST['img2'];
    $date = date('Y-m-d');
    $time = date('H:i:s');

    $imgFile = $_POST['imgFile'];

    $sql = "insert into result2 (
        name,
        age,
        gender,
        country,
        blood_type,
        hair_type1,
        hair_type2,
        hair_type3,
        skin_type,
        acc,
        img1,
        img2,
        date,
        time
        )
    values (
    '" . $name . "',
    '" . $age . "',
    '" . $gender . "',
    '" . $country . "',
    '" . $blood_type . "',
    '" . $hair_type1 . "',
    '" . $hair_type2 . "',
    '" . $hair_type3 . "',
    '" . $skin_type . "',
    '" . $acc . "',
    '" . $img1 . "',
    '" . $img2 . "',
    '" . $date . "',
    '" . $time . "'
    )";

    $res = mysqli_query($conn, $sql);

    ?>
    <script>
        if (<?= $res ?>) {
            alert("등록되었습니다.")
            document.location.href = "/data/data_add.php" //부모의 부모창 다시 열기
        } else {
            alert("실패했습니다.")
            history.back();
        }
    </script>

</body>

</html>