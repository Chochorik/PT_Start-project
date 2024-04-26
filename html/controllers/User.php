<?php

class User
{
    protected object $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:hostname=db;dbname=project', 'root', 'kali');
        } catch (PDOException $exception) {
            echo 'Не удалось подключиться к базе данных: ' . $exception->getMessage();
        }
    }

    public function register($email, $username, $password) : void
    {
        if (!$email || !$username || !$password) {
            die('Введите все значения!');
        }

        $statement = $this->connection->prepare("INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')");

        if (!$statement->execute()) {
            echo 'Не удалось зарегистрироваться';
        }
    }

    public function login($username, $password): void
    {
        if (!$username || !$password) {
            die('Введите все значения!');
        }

        $statement = $this->connection->prepare("SELECT * FROM users WHERE username='$username' AND password='$password'");
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            setcookie("User", $username, time()+7200);
            header('Location: profile.php');
        } else {
            echo "Неправильное имя или пароль";
        }
    }
}