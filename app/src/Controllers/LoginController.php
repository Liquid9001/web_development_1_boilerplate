<?php

namespace App\Controllers;

use App\Config;

class LoginController
{
    /**
     * Show login form
     */
    public function loginForm($params = [])
    {
        require __DIR__ . '/../Views/login.php';
    }

    /**
     * Process login
     */
    public function login($params = [])
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->loginForm($params);
            return;
        }

        $user = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';

        if ($user === Config::ADMIN_USER && $pass === Config::ADMIN_PASS) {
            $_SESSION['is_admin'] = true;
            header('Location: /guestbook/manage');
            exit();
        }

        // simple failure - redisplay form with a message
        $error = 'Invalid credentials';
        require __DIR__ . '/../Views/login.php';
    }

    public function register($params = [])
    {
        require __DIR__ . '/../Views/register.php';
    }

    public function logout($params = [])
    {
        if (isset($_SESSION['is_admin'])) {
            unset($_SESSION['is_admin']);
        }
        header('Location: /guestbook');
        exit();
    }
}
