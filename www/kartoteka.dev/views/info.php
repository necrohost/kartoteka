<?php session_start();
if(!$_SESSION['auth'] == true) {
header("Location: /login");
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Info</title>
    <link rel="stylesheet" href="public/assets/css/info.css">
</head>

<body>
    <div class="container">
        <div class="info">
            <div class="info-img">
                <img src="<?= $row['poster'] ?>" alt="">
            </div>
            <div class="info-text">
                <h3 class="title"><?= $row['name'] ?></h3>
                <p class="year"><?= $row['year'] ?></p>
                <p class="genre"><?= $row['genre'] ?></p>
                <p class="description"><?= $row['description'] ?></p>
                <p class="date-added">2020-01-27</p>

                <p class="status"><?= $row['id'] ?></p>
                <div class="buttons">
                    <a href="/list" class="btn blue">Back</a>
                    <a href="/edit?id=<?= $row['id'] ?>" class="btn green">Edit</a>
                    <a href="/del?id=<?= $row['id'] ?>" class="btn red">Delete</a>
                </div>
            </div>
        </div>
    </div>
</body></html>