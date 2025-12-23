<?php
session_start();
class Login extends connection {
    public function user($email, $password) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?');

        if (!$stmt->execute([$email])) {
            exit("Database query error");
        }


        if ($stmt->rowCount() == 0) {
            header('Location: ../login.php?error=usernotfound');
            exit();
        } else {
            $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $userdata['password'])) {
                $_SESSION['user_id'] = $userdata['id'];
                $_SESSION['user_username'] = $userdata['username'];
                $_SESSION['user_email'] = $userdata['email'];
                header('Location: ../index.php?success');
                exit();
            } else {
                header('Location: ../login.php?error=passworddoesnotmatch');
                exit();
            }
        }
    }
}
?>
