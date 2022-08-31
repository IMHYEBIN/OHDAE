<?php session_start() ?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>INRUT</title>
</head>

<body>
    <?php
    ////////////////////////////////////////////////////////////////////////////////////////mysql 커넥션 객체 생성
    $conn = mysqli_connect("localhost", "server", "00000000", "dataset");

    ////////////////////////////////////////////////////////////////////////////////////////board_delete_form.php 페이지에서 넘어온 글 번호값 저장 및 출력
    $id = $_GET["id"];
    
    ////////////////////////////////////////////////////////////////////////////////////////커넥션 객체 생성 여부 확인
    // if ($conn) {
    //     echo "연결 성공<br>";
    // } else {
    //     die("연결 실패 : " . mysqli_connect_error());
    // }

    //삭제 결과 확인
    echo $sql1 = "SELECT count(id) as count FROM result2 WHERE id='" . $id . "'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($res1);

    echo "GET ID" . $id;
    echo "확인할 ID" . $row1['count'];

    if ($row1['count'] != 0) {
        echo "<script>
        alert('삭제 성공했습니다.');
        </script>";
    } else {
        echo "<script>
        alert('삭제 실패했습니다.');
        </script>";
    }

    ////////////////////////////////////////////////////////////////////////////////////////board테이블에서 입력된 글 번호와, 글 비밀번호가 일치하는 행 삭제 쿼리
    $sql = "DELETE FROM result2 WHERE id='" . $id . "'";
    $res = mysqli_query($conn, $sql);

    ///////////////////////////////////////////////////////////////////////////////////////쿼리 실행 여부 확인
    // if (mysqli_query($conn, $sql)) {
    //     echo "삭제 성공: " . $result; //과제 작성시 에러메시지 출력하게 만들기
    // } else {
    //     echo "삭제 실패: " . mysqli_error($conn);
    // }



    mysqli_close($conn);
    ?>
</body>

</html>