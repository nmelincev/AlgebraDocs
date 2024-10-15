<?php
require_once 'models/User.php';
require_once 'views/View.php';

class UserController {
    private $userModel;

    public function __construct() {
        $db = new PDO('mysql:host=localhost;dbname=inventory', 'root', '');
        $this->userModel = new User($db);
    }

    public function showRegisterForm() {
        View::render('users/register.php');
    }

    public function register() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $this->userModel->register($username, $password);
        header('Location: /login');
    }

    public function showLoginForm() {
        View::render('users/login.php');
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $this->userModel->login($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: /products');
        } else {
            View::render('users/login.php', ['error' => 'Invalid username or password']);
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
    }
}
?>
