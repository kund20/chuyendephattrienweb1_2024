<?php

function encodeId($id) {
    $secretKey = "your_secret_key"; 
    $hashedId = hash('sha256', $id . $secretKey);
    return rtrim(strtr(base64_encode($hashedId), '+/', '-_'), '=');
}   

function decodeId($encodedId) {
    $decodedId = base64_decode(str_pad(strtr($encodedId, '-_', '+/'), strlen($encodedId) % 4, '=', STR_PAD_RIGHT));
    $parts = explode(':', $decodedId);
    

    if (count($parts) !== 2) {
        return null;
    }
    
    $id = $parts[0];
    $secretKey = $parts[1];

    if ($secretKey !== "your_secret_key") {
        return null;
    }
    
    return $id;
}

?>
