<?php
include 'function.php'; 

$userId = 2;
$encodedUserId = encodeId($userId);
echo "URL cập nhật: http://localhost:8080/training-php/security/form_user.php?id=" . $encodedUserId;
?>
