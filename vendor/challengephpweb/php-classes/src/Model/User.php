<?php

namespace Cpw\Model;

use \Cpw\DB\Sql;
use \Cpw\Model;

class User extends Model{
  const SESSION = "User";

  public static function login($login, $password)
  {

    $sql = new Sql();

    $results = $sql->select("select * from users where login = :login", array(
      ":login"=>$login
    ));

    if (count($results) === 0)
    {
      throw new \Exception("Usuário inexistente ou senha inválida.", 1);
    }

    $data = $results[0];

    if (password_verify($password, $data["password"]) === true)
    {
      
      $user = new User();

      $user->setData($data);

      $_SESSION[User::SESSION] = $user->getValues();

      return $user;


    } else {
      throw new \Exception("Usuário inexistente ou senha inválida.", 1);
    }

  }

  public static function verifyLogin($isadmin = true)
  {
    if (
      !isset($_SESSION[User::SESSION])
      ||
      !$_SESSION[User::SESSION]
      ||
      !(int)$_SESSION[User::SESSION]["id"] > 0
      ||
      (bool)$_SESSION[User::SESSION]["isadmin"] !== $isadmin
    ) {
      header("Location: /admin/login");
      exit;
    }
  }

  public static function logout()
  {
    $_SESSION[User::SESSION] = null;
  }
}

?>