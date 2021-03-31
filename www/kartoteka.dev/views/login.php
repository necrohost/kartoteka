<?php session_start();
if($_SESSION['auth'] == true) {
header("Location: /list");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link rel="stylesheet" href="public/assets/css/main.css">
</head>
<body>
    <div class="container-form">
        <form action="/login" method="post">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="password" placeholder="pass">
            <button type="submit" class="btn">Sign in</button>
            <a href="/reg" class="small-link">not login?</a>
        </form>
    </div>
</body>
</html>