<?php
$host = "localhost"; // MySQL 호스트
$user = "your_username"; // MySQL 사용자 이름
$password = "your_password"; // MySQL 비밀번호
$database = "your_database"; // MySQL 데이터베이스 이름

// 데이터베이스 연결
$conn = new mysqli($host, $user, $password, $database);

// 연결 오류 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 입력 데이터 받아오기
$id = $_POST["id"];
$pw = $_POST["pw"];
$nickname = $_POST["nickname"];

// 비밀번호 해싱 (보안 강화)
$hashed_password = password_hash($pw, PASSWORD_DEFAULT);

// SQL 쿼리 작성
$sql = "INSERT INTO users (id, pw, nickname) VALUES ('$id', '$hashed_password', '$nickname')";

// 쿼리 실행
if ($conn->query($sql) === TRUE) {
    echo "회원 가입 성공!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 데이터베이스 연결 종료
$conn->close();
?>