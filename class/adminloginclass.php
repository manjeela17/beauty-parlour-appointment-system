<?php
session_start();
class adminlogin extends connection {
    public function user($email, $password) {
        $stmt = $this->connect()->prepare('SELECT * FROM admin WHERE email = ?');

        if (!$stmt->execute([$email])) {
            header('Location:adminlogin.php?error=executionfailed');
            exit("Database query error");
        }


        if ($stmt->rowCount() == 0) {
            header('Location:adminlogin.php?error=usernotfound');
            exit();
        } else {
            $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $userdata['password'])) {
                $_SESSION['admin_id'] = $userdata['a_id'];
                header('Location:../admin/admin.php?success');
                exit();
            } else {
                header('Location:adminlogin.php?error=passworddoesnotmatch');
                exit();
            }
        }
    }
}
?>
