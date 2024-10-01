<?php
// Bắt đầu phiên
session_start();
require_once 'models/UserModel.php';
require_once 'function.php';

$userModel = new UserModel();

$user = NULL;
$_id = NULL;

// Kiểm tra ID từ URL để xác định nếu đang sửa
if (!empty($_GET['id'])) {
    $_id = decodeId($_GET['id']);
    $user = $userModel->findUserById($_id);
}

$errors = [];
$name = $user ? $user['name'] : '';
$password = '';

// Kiểm tra khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $errors['name'] = "Tên là bắt buộc.";
    } else {
        $name = trim($_POST["name"]);
        if (!preg_match("/^[A-Za-z0-9]{5,15}$/", $name)) {
            $errors['name'] = "Tên phải từ 5 đến 15 ký tự và chỉ chứa ký tự hợp lệ (A-Z, a-z, 0-9).";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $errors['password'] = "Mật khẩu là bắt buộc.";
    } else {
        $password = trim($_POST["password"]);
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/", $password)) {
            $errors['password'] = "Mật khẩu phải từ 5 đến 10 ký tự và bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt.";
        }
    }

    // Nếu không có lỗi, xử lý thêm hoặc cập nhật người dùng
    if (empty($errors)) {
        if (!empty($_id)) {
            // Cập nhật người dùng
            $_POST['id'] = $_id; // Thêm ID vào mảng POST để cập nhật
            $userModel->updateUser($_POST);
        } else {
            // Thêm người dùng mới
            $userModel->insertUser($_POST);
        }
        header('Location: list_users.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <title><?php echo $user ? 'Cập nhật người dùng' : 'Thêm người dùng'; ?></title>
    <?php include 'views/meta.php'; ?>
</head>

<body>
    <?php include 'views/header.php'; ?>
    <div class="container">

        <div class="alert alert-warning" role="alert">
            <?php echo $user ? 'Cập nhật người dùng' : 'Thêm người dùng'; ?>
        </div>

        <form method="POST" action="">
            <?php if ($_id): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_id); ?>"> <!-- Giữ ID gốc cho cập nhật -->
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Tên</label>
                <input class="form-control" type="text" placeholder="Tên" name="name" id="name"
                    value="<?php echo htmlspecialchars($name); ?>">
                <?php if (isset($errors['name'])): ?>
                    <div style="color: red;"><?php echo $errors['name']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input class="form-control" type="password" placeholder="Mật khẩu" name="password" id="password">
                <?php if (isset($errors['password'])): ?>
                    <div style="color: red;"><?php echo $errors['password']; ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">
                <?php echo $user ? 'Cập nhật người dùng' : 'Thêm người dùng'; ?>
            </button>
        </form>
    </div>
</body>

</html>