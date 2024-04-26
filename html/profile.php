<?php
if (!isset($_COOKIE['User'])) {
    header("Location: index.php");
}

require_once './autoload.php';

$post = new Post();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];

    $post->create($title, $text);

    if(!empty($_FILES["file"]))
    {
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Загружено в:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "Загрузка не удалась!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru" class="page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Медведев Н.С.</title>
    <link rel="preload" href="fonts/MullerRegular.woff2" as="font" type="font/woff2" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer="defer" src="js/main.js"></script>
</head>
<body class="page__body">
<div class="site-container">
    <header class="header">
        <div class="header__container container">
            <div class="header__logo"></div>
            <nav class="header__nav"><a class="header__link" href="#about-me">Обо мне</a></nav>
        </div>
    </header>
    <main class="main">
        <section class="about-me" id="about-me">
            <div class="about-me__container container">
                <div class="about-me__descr"><h1 class="about-me__title">Немного обо мне:</h1>
                    <p class="about-me__blank">Медведев Никита Сергеевич. Учусь в Ростовском-на-Дону колледже связи
                        и информатики на факультете «Обеспечение информационной безопасности автоматизированных систем»
                        и очень хочу работать в направлении WEB. Буду рад получить опыт в компании Positive
                        Technologies!</p></div>
                <div class="about-me__picture">
                    <div class="about-me__img"></div>
                    <p class="about-me__caption">Медведев Н.С.</p></div>
            </div>
        </section>
        <section class="js-practice">
            <div class="js-practice__container container">
                <button id="button1">Нажми :)</button>
                <p class="js-practice__text">Тестовый текст</p>
                <div class="demo" id="demo"></div>
            </div>
        </section>
        <section class="hero">
            <div class="hero__container container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="hero__title">
                            Привет, <?=$_COOKIE['User']?>!
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="posts">
            <div class="posts__container container">
                <div class="row">
                    <div class="col-12">
                        <form class="posts__form" method="POST" action="./profile.php" enctype="multipart/form-data" name="upload">
                            <label class="posts__label">
                                <input class="posts__input" type="text" name="title" placeholder="Название поста">
                            </label>
                            <label class="posts__label">
                                <textarea class="posts__textarea" name="text" cols="30" rows="10" placeholder="Введите текст поста..."></textarea>
                            </label>
                            <label class="posts__label">
                                <input class="posts__file-input" type="file" name="file"  />
                            </label>
                            <button class="posts__btn" type="submit" name="submit">
                                Сохранить пост
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
