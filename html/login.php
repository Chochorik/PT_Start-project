<?php
if (isset($_COOKIE['User'])) {
    header("Location: registration.php");
}

require_once './autoload.php';

$user = new User();

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    $user->login($username, $password);
}
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
        <section class="main__section registration">
            <div class="registration__container container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="registration__title">
                            Вход
                        </h1>
                    </div>
                </div>
                <div class="registration__block col-12">
                    <form class="registration__form" method="POST" action="/login.php">
                        <label class="row registration__form-label">
                            <input class="registration__form-input" name="name" type="text" placeholder="Имя пользователя" required>
                        </label>
                        <label class="row registration__form-label">
                            <input class="registration__form-input" name="password" type="password" placeholder="Пароль" required>
                        </label>
                        <button class="registration__btn" type="submit" name="submit">
                            Войти
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
