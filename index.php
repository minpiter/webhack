<?php
session_start();

// 로그인되어 있지 않으면 로그인 페이지로 이동
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
</head>
<body>
    <h1>Main Page</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <form method="post" action="login.php">
        <input type="hidden" name="logout" value="true">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
