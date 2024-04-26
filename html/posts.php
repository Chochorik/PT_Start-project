<?php
require_once './autoload.php';

$id = $_GET['id'];

$db = new Post();
$post = $db->get($id);

$title = $post['title'];
$text = $post['main_text'];

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
    <main class="main">
        <section class="post">
            <div class="post__container container">
                <h1>
                    <?=$title?>
                </h1>
                <p>
                    <?=$text?>
                </p>
            </div>
        </section>
    </main>
</div>
</body>
</html>