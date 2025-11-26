<?php

namespace App\Controllers;

use App\Config;

class GuestbookController
{
    public function getAll()
    {
        try {
            $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";

            $connection = new \PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD
            );

            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT id, posted_at, name, email, message FROM posts";
            $results = $connection->query($sql);
            $posts = $results->fetchAll(\PDO::FETCH_ASSOC);
            require __DIR__ . '/../Views/guestbook.php';


        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function postMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = htmlspecialchars($_POST['name'] ?? 'Anonymous');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');

            try {
                $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";

                $connection = new \PDO(
                    $connectionString,
                    Config::DB_USERNAME,
                    Config::DB_PASSWORD
                );
                $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO posts (name, email, message) VALUES (:name, :email, :message)";
                $stmt = $connection->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':message' => $message
                ]);
                header('Location: /guestbook');
                exit();
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

    }

    public function manage($params = [])
    {
        if (!isset($_SESSION) || empty($_SESSION['is_admin'])) {
            header('Location: /login');
            exit();
        }

        try {
            $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";

            $connection = new \PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD
            );
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT id, posted_at, name, email, message FROM posts";
            $results = $connection->query($sql);
            $posts = $results->fetchAll(\PDO::FETCH_ASSOC);

            require __DIR__ . '/../Views/guestbook_manage.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($params = [])
    {
        if (!isset($_SESSION) || empty($_SESSION['is_admin'])) {
            header('Location: /login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo 'Method Not Allowed';
            return;
        }

        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /guestbook/manage');
            exit();
        }

        try {
            $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";
            $connection = new \PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD
            );
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $connection->prepare($sql);
            $stmt->execute([':id' => $id]);

            header('Location: /guestbook/manage');
            exit();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

 
    public function editForm($params = [])
    {
        if (!isset($_SESSION) || empty($_SESSION['is_admin'])) {
            header('Location: /login');
            exit();
        }

        $id = $params['id'] ?? null;
        if (!$id) {
            header('Location: /guestbook/manage');
            exit();
        }

        try {
            $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";
            $connection = new \PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD
            );
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT id, posted_at, name, email, message FROM posts WHERE id = :id";
            $stmt = $connection->prepare($sql);
            $stmt->execute([':id' => $id]);
            $post = $stmt->fetch(\PDO::FETCH_ASSOC);

            require __DIR__ . '/../Views/edit_guestbook.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function update($params = [])
    {
        if (!isset($_SESSION) || empty($_SESSION['is_admin'])) {
            header('Location: /login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo 'Method Not Allowed';
            return;
        }

        $id = $params['id'] ?? $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /guestbook/manage');
            exit();
        }

        $name = htmlspecialchars($_POST['name'] ?? 'Anonymous');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $message = htmlspecialchars($_POST['message'] ?? '');

        try {
            $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";
            $connection = new \PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD
            );
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE posts SET name = :name, email = :email, message = :message WHERE id = :id";
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':message' => $message,
                ':id' => $id
            ]);

            header('Location: /guestbook/manage');
            exit();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}