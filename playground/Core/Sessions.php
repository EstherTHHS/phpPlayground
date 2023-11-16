<?php

namespace Core;

class Sessions
{
    protected $conn = null;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function login($email, $password)
    {
        if ($row = $this->checkUser($email)) {
            if (password_verify($password, $row['password'])) {
                login([
                    'id' => $row['id'],
                    'email' => $email
                ]);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        return false;
    }

    public function logout()
    {
    }

    private function checkUser($email)
    {
        $query = sprintf(
            "SELECT * FROM users WHERE email = '%s'",
            mysqli_real_escape_string($this->conn, $email)
        );

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            return false;
        }

        return mysqli_fetch_assoc($result);
    }

    public static function isLoggedIn()
    {
        return $_SESSION['user'] ?? false;
    }

    public static function userName()
    {
        return $_SESSION['user']->getUserName();
    }
}
