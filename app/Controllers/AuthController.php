<?php

class AuthController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: " . ROOT . "/dashboard");
            exit();
        }

        return $this->view('auth/login');
    }

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: " . ROOT . "/dashboard");
            exit();
        }

        $error = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $user = new User;
            $result = $user->first(["email" => $email]);
            if ($result) {
                if (password_verify($password, $result->password)) {
                    $_SESSION['user_id'] = $result->id;
                    $_SESSION['fullname'] = $result->fullname;
                    $_SESSION['role'] = $result->role;
                    header("Location: " . ROOT . "/dashboard");
                    exit();
                } else {
                    $error = 'Invalid password';
                }
            } else {
                $error = 'User is not found';
            }

            return $this->view('auth/login', ['error' => $error]);
        }
    }

    public function register()
    {
        $this->view('auth/register');
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . ROOT . "/auth/login");
        exit();
    }

    public function resetPassword() {}
}
