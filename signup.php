<?php
$host = '192.168.8.11'; // DB 서버 IP
$user = 'your_db_user';
$pass = 'your_db_password';
$db = 'your_db_name';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "회원가입 성공!";
} else {
    echo "에러: " . $conn->error;
}

$conn->close();
?>

