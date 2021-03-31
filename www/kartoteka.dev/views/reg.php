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
        <form action="/reg" method="post">
            <input type="text" name="login" placeholder="email">
            <input type="password" name="password" placeholder="pass">
            <input type="password" name="repeatpass" placeholder="repeat">
            <button type="submit" class="btn">Sign up</button>
            <a href="/login" class="small-link">use login</a>
        </form>
    </div>
</body>
</html>