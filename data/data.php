<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>INRUT</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/data/css/data.css?ver=1">
</head>

<body>
	<div class="wrapper">
		<h1 class="title">전체 데이터</h1>

		<?php
		$currentPage = 1;
		if (isset($_GET["currentPage"])) {
			$currentPage = $_GET["currentPage"];
		}

		//mysqli_connect()함수로 커넥션 객체 생성
		$conn = mysqli_connect("localhost", "server", "00000000", "dataset");
		//커넥션 객체 생성 확인
		// if ($conn) {
		// 	echo "연결 성공<br>";
		// } else {
		// 	echo "연결 실패<br>";
		// }

		//페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
		$sqlCount = "SELECT count(*) FROM result2";
		$resultCount = mysqli_query($conn, $sqlCount);
		if ($rowCount = mysqli_fetch_array($resultCount)) {
			$totalRowNum = $rowCount["count(*)"];   //php는 지역 변수를 밖에서 사용 가능.
		}
		//행 갯수 조회 쿼리가 실행 됐는지 여부
		// if ($resultCount) {
		// 	echo "행 갯수 조회 성공 : " . $totalRowNum . "<br>";
		// } else {
		// 	echo "결과 없음: " . mysqli_error($conn);
		// }

		$rowPerPage = 10;   //페이지당 보여줄 게시물 행의 수
		$begin = ($currentPage - 1) * $rowPerPage;
		//result2 테이블을 조회해서 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
		//입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
		$sql = "SELECT * FROM result2 order by id desc limit " . $begin . "," . $rowPerPage . "";
		$result = mysqli_query($conn, $sql);
		//쿼리 조회 결과가 있는지 확인
		// if ($result) {
		// 	echo "조회 성공";
		// } else {
		// 	echo "결과 없음: " . mysqli_error($conn);
		// }
		?>
		<div class="contents">
			<iframe name='frame_data_img' src="/data/data_img.php" frameborder="1"></iframe>
			<table class="table table-hover table-borderless text-center">
				<thead>
				<tr class="th_color th_top">
					<th class="th_id" rowspan="2">번호</th>
					<th class="th_name" rowspan="2">성명</th>
					<th class="th_age" rowspan="2">나이</th>
					<th class="th_gender" rowspan="2">성별</th>
					<th class="th_country" rowspan="2">국적</th>
					<th class="th_bloodtype" rowspan="2">혈액형</th>
					<th class="th_hair_type" colspan="3">탈모 유형</th>
					<th class="th_skin_type" rowspan="2">피부 분류</th>
					<th class="th_img1" rowspan="2">이미지1</th>
					<th class="th_img2" rowspan="2">이미지2</th>
					<th class="th_date" rowspan="2">날짜</th>
					<th class="th_time" rowspan="2">시간</th>
					<th class="th_acc" rowspan="2">비고</th>
					<th class="th_set" rowspan="2" colspan="2">관리</th>
				</tr>
				<tr class="th_color th_top th_hair_type_item">
					<th class="th_hair_type1">NORWOOD</th>
					<th class="th_hair_type2">LUDWIG</th>
					<th class="th_hair_type3">BASP</th>
				</tr>
				</thead>
				<tbody>
				<?php
				//반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $row["id"]; ?></td>
						<td>
							<?php
							// echo "<a href='/data/data_detail.php?id=" . $row["id"] . "'>";
							echo $row["name"];
							// echo "</a>";
							?>
						</td>
						<td class="td_id"><?php echo $row["age"]; ?></td>
						<td class="td_name"><?php echo $row["gender"]; ?></td>
						<td class="td_age"><?php echo $row["country"]; ?></td>
						<td class="td_gender"><?php echo $row["blood_type"]; ?></td>
						<td class="td_country"><?php echo $row["hair_type1"]; ?></td>
						<td class="td_bloodtype"><?php echo $row["hair_type2"]; ?></td>
						<td class="td_hair_type"><?php echo $row["hair_type3"]; ?></td>
						<td class="td_skin_type"><?php echo $row["skin_type"]; ?></td>
						<td class="td_img1"><?php echo $row["img1"]; ?></td>
						<td class="td_img2"><?php echo $row["img2"]; ?></td>
						<td class="td_date"><?php echo $row["date"]; ?></td>
						<td class="td_time"><?php echo $row["time"]; ?></td>
						<td class="td_acc"><?php echo $row["acc"]; ?></td>
						<?php
						echo "<td><a class='showbtn' href='/data/data_img.php?img1=" . $row["img1"] . "&img2=" . $row["img2"] . "' target='frame_data_img'>보기</a></td>";
						echo "<td><a class='deletebtn' href='/data/action/action_data_delete.php?id=" . $row["id"] . "'>삭제</a></td>";
						?>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
		<div class="bottom">
			<?php
			//currentPage 변수가 1보다 클때만 이전 버튼이 활성화 되도록 함
			if ($currentPage > 1) {
				//이전 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 뺀 값이 넘어가도록 함
				echo "<a class='btn btn-primary pagebtn before' href ='/data/data.php?currentPage=" . ($currentPage - 1) . "'>이전</a>&nbsp;&nbsp;&nbsp;&nbsp;";
			}

			$lastPage = ($totalRowNum - 1) / $rowPerPage;

			if (($totalRowNum - 1) % $rowPerPage != 0) {
				$lastPage += 1;
			}
			//lastPage변수가 currentPage 변수보다 클때만 다음 버튼이 활성화 되도록 함
			if ($currentPage <= $lastPage) {
				//다음 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 더한 값이 넘어가도록 함
				echo "<a class='btn btn-primary pagebtn after' href='/data/data.php?currentPage=" . ($currentPage + 1) . "'>다음</a>";
			}
			mysqli_close($conn);
			?>
			<!-- <a class="btn btn-primary" href="/result2_add_form.php">신규 등록</a> -->
			<script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
		</div>
	</div>
</body>

</html>