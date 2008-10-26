<?php

class Admin_UsersModel extends BlogAdminBaseModel
{
  /**
   * Attempt to find an user account with these credentials
   *
   * @param string $username Login username
   * @param string $password Password for this account
   * @return User's record array, or false if not found
   */

  public function authenticateAccount($username, $password)
  {
    $pdo = $this->getPdo();

    $stmt = $pdo->prepare('SELECT * FROM admin_users WHERE username = ? AND password = ? LIMIT 1');
    $stmt->execute(array($username, $password));

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}

?>