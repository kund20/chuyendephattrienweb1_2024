<?php
function encodeId($id) {
    $secretKey = "your_secret_key"; // Đặt một khóa bí mật
    $encodedId = base64_encode($id . ':' . $secretKey);
    return rtrim(strtr($encodedId, '+/', '-_'), '='); // Thay đổi ký tự để an toàn cho URL
}

function decodeId($encodedId) {
    $decodedId = base64_decode(str_pad(strtr($encodedId, '-_', '+/'), strlen($encodedId) % 4, '=', STR_PAD_RIGHT));
    $parts = explode(':', $decodedId);
    
    // Kiểm tra nếu có đủ phần tử trong mảng
    if (count($parts) !== 2) {
        return null; // Không hợp lệ
    }
    
    $id = $parts[0];
    $secretKey = $parts[1];

    // Kiểm tra khóa bí mật
    if ($secretKey !== "your_secret_key") {
        return null; // Không hợp lệ
    }
    
    return $id;
}

?>
