<?php
session_start();
require_once 'models/UserModel.php';
require_once 'function.php';

$userModel = new UserModel();

$user = NULL;
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = decodeId($_GET['id']);
    $user = $userModel->findUserById($_id);
}

$errors = [];
$name = $user ? $user['name'] : '';
$password = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errors['name'] = "Tên là bắt buộc.";
    } else {
        $name = trim($_POST["name"]);
        if (!preg_match("/^[A-Za-z0-9]{5,15}$/", $name)) {
            $errors['name'] = "Tên phải từ 5 đến 15 ký tự và chỉ chứa ký tự hợp lệ (A-Z, a-z, 0-9).";
        }
    }

    if (empty($_POST["password"])) {
        $errors['password'] = "Mật khẩu là bắt buộc.";
    } else {
        $password = trim($_POST["password"]);
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/", $password)) {
            $errors['password'] = "Mật khẩu phải từ 5 đến 10 ký tự và bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt.";
        }
    }

    if (empty($errors)) {
        if (!empty($_id)) {
            $_POST['id'] = $_id; 
            $userModel->updateUser($_POST);
        } else {
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
        <label for="name">Update</label>
        </div>

        <form method="POST" action="">
            <?php if ($_id): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_id); ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" placeholder="Name" name="name" id="name"
                    value="<?php echo htmlspecialchars($name); ?>">
                <?php if (isset($errors['name'])): ?>
                    <div style="color: red;"><?php echo $errors['name']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input class="form-control" type="password" placeholder="password" name="password" id="password">
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