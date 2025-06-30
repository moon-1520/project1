<?php
$conn = new mysqli("localhost", "root", "", "shoppingmall");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$user_id = $_POST['user_id'];
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];

// DB 저장
$stmt = $conn->prepare("INSERT INTO cart (user_id, product_name, quantity) VALUES (?, ?, ?)");
$stmt->bind_param("isi", $user_id, $product_name, $quantity);

if ($stmt->execute()) {
    echo "장바구니에 상품이 추가되었습니다.";
} else {
    echo "에러: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
