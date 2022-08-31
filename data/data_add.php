<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>INRUT</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/data/css/data_add.css">

</head>

<body>
    <div class="wrapper">
        <h1 class="title">신규 데이터 등록</h1>
        <!-- board_add_action.php로 넘기는 폼 -->
        <table class="table1">
            <form name="reqform" method="post" action="/fileUploadResult.php" enctype="multipart/form-data">
                <tr>
                    <th class="th1">이미지1</th>
                    <td class="flex_row">
                        <div id="filename1"></div>
                        <label for="ex_file1" onclick="loadFile()">파일찾기</label>
                        <input id="ex_file1" type="file" name="imgFile1" onchange="javascript: document.getElementById('filename1').innerHTML = this.value" /><br>
                        <input class="upload_btn" type="submit" value="업로드" />
                    </td>
                </tr>
            </form>
            <form name="reqform" method="post" action="/fileUploadResult2.php" enctype="multipart/form-data">
                <tr>
                    <th class="th1">이미지2</th>
                    <td class="flex_row">
                        <div id="filename2"></div>
                        <label for="ex_file2">파일찾기</label>
                        <input id="ex_file2" type="file" name="imgFile2" onchange="javascript: document.getElementById('filename2').innerHTML = this.value" /><br>
                        <input class="upload_btn" type="submit" value="업로드" />
                    </td>
                </tr>
            </form>
        </table>

        <form class="form-horizontal" action="/data/action/action_data_add.php" method="post">
            <div class="contents">
                <table class="table2">
                    <tr class="img_hidden">
                        <th class="th2">이미지1</th>
                        <td><input type="text" name="img1" value="<?= substr($_SESSION['imgFile1'], 1) ?>"></td>
                    </tr>
                    <tr class="img_hidden">
                        <th class="th2">이미지2</th>
                        <td><input type="text" name="img2" value="<?= substr($_SESSION['imgFile2'], 1) ?>"></td>
                    </tr>
                    <tr>
                        <th class="th2" colspan="2">성명</th>
                        <td><input type="text" name='name' placeholder="성명을 입력해주세요." required></td>
                    </tr>
                    <tr>
                        <th class="th2" colspan="2">나이</th>
                        <td><input type="text" name='age' placeholder="나이를 입력해주세요." required></td>
                    </tr>
                    <tr>
                        <th class="th2" colspan="2">성별</th>
                        <td>
                            <select name="gender">
                                <option value="남자">남자</option>
                                <option value="여자">여자</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="th2" colspan="2">국적</th>
                        <td>
                            <select name="country">
                                <option value="Korea">Korea</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="China">China</option>
                                <option value="International">International</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="ME">ME</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Russia">Russia</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Spain">Spain</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="th2" colspan="2">혈액형</th>
                        <td>
                            <select name="blood_type">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB">AB+</option>
                                <option value="AB">AB-</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="th3" rowspan="4">탈모 유형</th>
                    </tr>
                    <tr>
                        <th class="th3">NORWOOD</th>
                        <td>
                            <select name="hair_type1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="th3">LUDWIG</th>
                        <td>
                            <select name="hair_type2">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="th3">BASP</th>
                        <td class="td_hair_type3">
                            <select name="hair_type3_1" class="hair_type3_1">
                                <option value="M0">M0</option>
                                <option value="M1">M1</option>
                                <option value="M2">M2</option>
                                <option value="M3">M3</option>
                                <option value="C0">C0</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                                <option value="C3">C3</option>
                                <option value="U0">U0</option>
                                <option value="U1">U1</option>
                                <option value="U2">U2</option>
                                <option value="L">L</option>
                            </select>
                            <select name="hair_type3_2" class="hair_type3_2">
                                <option value="V1">V1</option>
                                <option value="V2">V2</option>
                                <option value="V3">V3</option>
                                <option value="F1">F1</option>
                                <option value="F2">F2</option>
                                <option value="F3">F3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="th2" colspan="2">피부 분류</th>
                        <td>
                            <select name="skin_type" class="skin_type">
                                <option value="TYPE I">TYPE I</option>
                                <option value="TYPE II">TYPE II</option>
                                <option value="TYPE III">TYPE III</option>
                                <option value="TYPE IV">TYPE IV</option>
                                <option value="TYPE V">TYPE V</option>
                                <option value="TYPE VI">TYPE VI</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="th2" colspan="2">비고</th>
                        <td><input type="text" name='acc' placeholder="비고를 입력해주세요." required></td>
                    </tr>
                </table>

                <div class="bottombox">
                    &nbsp;&nbsp;&nbsp;
                    <!-- 글 입력 버튼 -->
                    <button class="bottom_btn" name="submit" type="submit" value="등록">등록</button>
                    &nbsp;&nbsp;
                    <!-- 입력 내용 초기화 버튼 -->
                    <button class="bottom_btn" type="reset" value="초기화">초기화</button>
                    &nbsp;&nbsp;
                    <!-- 리스트로 돌아가는 버튼 -->
                    <a class="bottom_btn" onclick="reset()">메인으로</a>
                </div>
            </div>
        </form>

        <script type="text/javascript">
            // //id가 XX인 객체에 변화가 생기면 checkXX 함수를 변화된 객체의 값을 매개로 호출
            // $("#password").change(function() {
            //     checkPassword($('#password').val());
            // });
            // $("#Title").change(function() {
            //     checkTitle($('#Title').val());
            // });
            // $("#content").change(function() {
            //     checkTitle($('#content').val());
            // });
            // $("#name").change(function() {
            //     checkName($('#name').val());
            // });
            // //입력된 변수의 길이를 참조하여 조건문을 통해 최소 입력 길이 유효성 검사를 하는 함수
            // function checkPassword(password) {
            //     if (password.length < 4) {
            //         alert("비밀번호는 4자 이상 입력하여야 합니다.");
            //         $('#password').val('').focus();
            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            // function checkTitle(Title) {
            //     if (Title.length < 2) {
            //         alert('제목은 2자 이상 입력해야 합니다.');
            //         $('#Title').val('').focus();

            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            // function checkContent(content) {
            //     if (content.length < 2) {
            //         alert('내용은 2자리 이상 입력해야 합니다.');
            //         $('#content').val('').focus();
            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            // function checkName(name) {
            //     if (name.length < 2) {
            //         alert('작성자명은 2자리 이상 입력해야 합니다.');
            //         $('#name').val('').focus();
            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            function reset() {
                parent.location.href = "/index.html";
            }
        </script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
    </div>
</body>

</html>