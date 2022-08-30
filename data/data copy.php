<?php session_start(); ?>
<?php

if ($_POST['img1_value'] != null) {
	$_SESSION['img1_value'] = $_POST['img1_value'];
} else {
	$_SESSION['img1_value'] = "/img/no_image.jpg";
}

if ($_POST['img2_value'] != null) {
	$_SESSION['img2_value'] = $_POST['img2_value'];
} else {
	$_SESSION['img2_value'] = "/img/no_image.jpg";
}

$currentPage = 1;
if (isset($_GET["currentPage"])) {
	$currentPage = $_GET["currentPage"];
}

//mysqli_connect()함수로 커넥션 객체 생성
$conn = mysqli_connect("localhost", "server", "00000000", "dataset");
// //커넥션 객체 생성 확인
// if ($conn) {
// 	echo "[DB 연결] 성공<br>";
// } else {
// 	echo "[DB 연결] 실패";
// }

//페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
$sqlCount = "SELECT count(*) FROM result2";
$resultCount = mysqli_query($conn, $sqlCount);
if ($rowCount = mysqli_fetch_array($resultCount)) {
	$totalRowNum = $rowCount["count(*)"];   //php는 지역 변수를 밖에서 사용 가능. ===================== ar0 에서 ar9 까지 있으므로 * 10 함
}
// //행 갯수 조회 쿼리가 실행 됐는지 여부
// if ($resultCount) {
// 	echo "[행 조회] 성공 ---- 전체 행 개수 : " . $totalRowNum . "<br>";
// } else {
// 	echo "[행 조회] 결과 없음: " . mysqli_error($conn);
// }

$rowPerPage = 10;   //페이지당 보여줄 게시물 행의 수
$begin = ($currentPage - 1) * $rowPerPage;
//data 테이블을 조회해서 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
//입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
$sql = "SELECT * FROM result2 order by id limit " . $begin . "," . $rowPerPage . "";
$result = mysqli_query($conn, $sql);
// $sql01 = "SELECT * FROM ar2 where id = " . $currentPage . " order by id";
// $result01 = mysqli_query($conn, $sql01);
// //쿼리 조회 결과가 있는지 확인
// if ($result) {
// 	echo "[테이블 조회] 성공";
// } else {
// 	echo "[테이블 조회] 없음: " . mysqli_error($conn);
// }
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>INRUT</title>
	<link rel="stylesheet" href="/css/data.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="wrapper">
		<div class="titlebox">
			<p>전체 데이터</p>
		</div>
		<!-- ============================================================================================== -->
		<div class="mainbox">
			<div class="imgbox">
				<img class="imgbox1" src="<?= $_SESSION['img1_value'] ?>" onerror="this.onerror=null; this.src='/img/no_image.jpg';">
				<img class="imgbox2" src="<?= $_SESSION['img2_value'] ?>" onerror="this.onerror=null; this.src='/img/no_image.jpg';">
			</div>
			<!-- ============================================================================================== -->
			<div class="tablebox">
				<table class="table table-hover ">
					<tr>
						<th class="table-secondary th_id" rowspan="2">번호</th>
						<th class="table-secondary th_name" rowspan="2">성명</th>
						<th class="table-secondary th_age" rowspan="2">나이</th>
						<th class="table-secondary th_gender" rowspan="2">성별</th>
						<th class="table-secondary th_country" rowspan="2">국적</th>
						<th class="table-secondary th_bloodtype" rowspan="2">혈액형</th>
						<th class="table-secondary" colspan="3">탈모 유형</th>
						<th class="table-secondary th_skin_type" rowspan="2">피부 분류</th>
						<th class="table-secondary th_img1" rowspan="2">이미지1</th>
						<th class="table-secondary th_img2" rowspan="2">이미지2</th>
						<th class="table-secondary th_date" rowspan="2">날짜</th>
						<th class="table-secondary th_time" rowspan="2">시간</th>
						<th class="table-secondary th_acc" rowspan="2">비고</th>
						<th class="table-secondary th_set" rowspan="2">관리</th>
					</tr>
					<tr>
						<th class="table-secondary th_hair_type1">NORWOOD</th>
						<th class="table-secondary th_hair_type2">LUDWIG</th>
						<th class="table-secondary th_hair_type3">BASP</th>
					</tr>
					<?php
					//반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
					for ($countA = 1; $row = mysqli_fetch_array($result); $countA++) {

						if ($row['gender'] == '1') {
							$gender_value = "남자";
						} else if ($row['gender'] == '2') {
							$gender_value = "여자";
						}

						if ($row['blood_type'] == '1') {
							$blood_type_value = "A";
						} else if ($row['blood_type'] == '2') {
							$blood_type_value = "B";
						} else if ($row['blood_type'] == '3') {
							$blood_type_value = "O";
						} else if ($row['blood_type'] == '4') {
							$blood_type_value = "AB";
						}

						echo "
				<tr>
				<form method='POST' action = 'data.php' target = '_self'>
					<td class='td_id'>" . $countA . "</td>
					<td class='td_name'>" . $row['name'] . "</td>
					<td class='td_age'>" . $row['age'] . "</td>
					<td class='td_gender'>" . $gender_value . "</td>
					<td class='td_country'>" . $row['country'] . "</td>
					<td class='td_bloodtype'>" . $blood_type_value . "</td>
					<td class='td_hair_type1'>" . $row['hair_type1'] . "</td>
					<td class='td_hair_type2'>" . $row['hair_type2'] . "단계</td>
					<td class='td_hair_type3'>" . $row['hair_type3'] . "</td>
					<td class='td_skin_type'>" . $row['skin_type'] . "</td>
					<td class='td_img1'>" . $row['img1'] . "</td>
					<td class='td_img2'>" . $row['img2'] . "</td>
					<td class='td_date'>" . $row['date'] . "</td>
					<td class='td_time'>" . $row['time'] . "</td>
					<td class='td_acc'>" . $row['acc'] . "</td>
					<td class='td_set'>
					<input type = 'hidden' name = 'img1_value' value= " . $row['img1'] . ">
					<input type = 'hidden' name = 'img2_value' value= " . $row['img2'] . ">
					<input class='btn' type='submit' value='보기'></td>
					</form>
				</tr>
			";
					}
					?>
				</table>
			</div>
		</div>

		<!-- ============================================================================================== -->

		<form method='POST' action='data.html' target='_self'>
			<!-- ============================================================================================== -->

			<div class='bottombox'>
				<?php
				//currentPage 변수가 1보다 클때만 이전 버튼이 활성화 되도록 함
				if ($currentPage > 1) {
					//이전 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 뺀 값이 넘어가도록 함
					echo "<div class='beforebox'><a id ='before' class='before' href ='/data.php?currentPage=" . ($currentPage - 1) . "'> ◀ </a></div>";
				}

				// ==============================================================================================
				$lastPage = ($totalRowNum - 1) / $rowPerPage;

				if (($totalRowNum - 1) % $rowPerPage != 0) {
					$lastPage += 1;
				}

				$sqlCount = "SELECT count(*) FROM result2";
				$resultCount = mysqli_query($conn, $sqlCount);
				if ($rowCount = mysqli_fetch_array($resultCount)) {
					$totalRowNum = $rowCount["count(*)"];   //php는 지역 변수를 밖에서 사용 가능. ===================== ar0 에서 ar9 까지 있으므로 * 10 함
				}
				echo "<div class='pagenumbox'>";
				//페이지넘버가  1에서 총 페이지개수일때까지 반복
				for ($countPAGE = 1; $countPAGE <= $lastPage + 1; $countPAGE++) {
					//받아온 페이지넘버와 현재 페이지 값이 같으면 색깔을 다르게 표시
					if ($countPAGE == $currentPage) {
						echo "
									<a class='pagenum' style='color:rgb(235, 57, 57); font-size:25px;' href='/data.php?currentPage=" . $countPAGE . "'>" . $countPAGE . "</a>
									";
					} else {
						echo "
								<a class='pagenum' href='/data.php?currentPage=" . $countPAGE . "'>" . $countPAGE . "</a>
								";
					}
				}
				echo "</div>";
				// ==============================================================================================
				//lastPage변수가 currentPage 변수보다 클때만 다음 버튼이 활성화 되도록 함
				if ($currentPage < $lastPage) {
					//다음 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 더한 값이 넘어가도록 함
					echo "<div class='afterbox'><a id ='after' class='after' href='/data.php?currentPage=" . ($currentPage + 1) . "'> ▶ </a></div>";
				}
				mysqli_close($conn);
				?>

			</div>
		</form>


	</div>
</body>

</html>