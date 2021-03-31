<?php session_start();
if(!$_SESSION['auth'] == true) {
header("Location: /login");
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>List</title>
    <link rel="stylesheet" href="public/assets/css/list.css">
</head>

<body>
    <div class="button-group">
        <ul>
            <li><a href="/add" class="btn">add film</a></li>
            <!-- <li><a href="/add" class="btn">add book</a></li> -->
        </ul>
    </div>
    <div class="wrapper">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="public/assets/images/locker.png" alt="" width="50">
                    <span class="logo-text">kartoteka</span>
                </div>

                <div class="nav-items">
                    <span class="login"><?= $_SESSION['login']; ?></span>
                    <a href="/logout" class="btn">Logout</a>
                </div>
            </div>
            <div class="card-grid">
            	<?php foreach($data as $key => $value): ?>
                <div class="card">
                    <div class="img-card">
                        <img src="<?= $value['poster'] ?>" alt="" height="280">
                    </div>
                    <p class="title"><?= $value['name'] ?></p>
                    <p class="year"><?= $value['year'] ?></p>
                    <a href="/info?id=<?= $value['id'] ?>" class="btn">INFO</a>
                    <p class="date-added"><?=date("m.d.y");?></p>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body></html>