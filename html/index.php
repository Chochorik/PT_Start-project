<?php
require_once './autoload.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vendor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Медведев Н.С.</title>
</head>
<body class="page__body">
<div class="site__container">
    <main class="main">
        <section class="main__section authorization">
            <div class="container">
                <div class="row">
                    <div class="col-12 index authorization__container">
                        <h1 class="authorization__title">
                            Страница постов
                        </h1>

                        <?php
                            if (!isset($_COOKIE['User'])) {
                        ?>

                            <div class="authorization__links-block">
                                <a class="authorization__link" href="/registration.php">
                                    Зарегистрируйтесь
                                </a>
                                <span class="authorization__span">
                                    или
                                </span>
                                <a class="authorization__link" href="/login.php">
                                    войдите!
                                </a>
                            </div>
                        <?php
                            } else {
                                $db = new Post();

                                $posts = $db->getAll();

                                if (count($posts) > 0) {
                                    foreach ($posts as $post) {
                                        echo "<a href='/posts.php?id=" . $post['id'] . "'>" . $post['title'] . "</a><br>";
                                    }
                                } else {
                                    echo 'Записей пока нет...';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>