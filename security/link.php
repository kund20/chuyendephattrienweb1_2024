<?php
include 'function.php'; // Nhúng file chứa các hàm

$userId = 2; // ID người dùng
$encodedUserId = encodeId($userId);
echo "URL cập nhật: http://localhost:8080/training-php/security/form_user.php?id=" . $encodedUserId;
?>
