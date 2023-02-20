<?php
session_start();

// 로그인 정보
$users = array(
    'user1' => 'password1',
    'user2' => 'password2',
    'user3' => 'password3'
);

// 로그아웃
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// 로그인 폼 제출
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 로그인 성공
    if (isset($users[$username]) && $users[$username] == $password) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    }
    // 로그인 실패
    else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
