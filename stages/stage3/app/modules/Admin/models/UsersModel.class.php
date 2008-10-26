<?php

class Admin_UsersModel extends BlogAdminBaseModel
{
  public function authenticateAccount($username, $password)
  {
    $pdo = $this->getPdo();

    $stmt = $pdo->prepare('SELECT * FROM admin_users WHERE username = ? AND password = ? LIMIT 1');
    $stmt->execute(array($username, $password));

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}

?>