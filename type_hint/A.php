<?php

require_once 'I.php'; // Nhúng interface I

class A implements I {
    public function f(): void {
        echo "This is function f from class A\n"; // Triển khai phương thức f()
    }
}