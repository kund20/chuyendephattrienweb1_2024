<?php

require_once 'I.php'; // Nhúng interface I

class B implements I {
    public function f(): void {
        echo "This is function f from class B\n"; // Triển khai phương thức f()
    }
}
