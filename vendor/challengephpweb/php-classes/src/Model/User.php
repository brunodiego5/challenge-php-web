<?php

namespace Cpw\Model;

use \Cpw\DB\Sql;
use \Cpw\Model;

class User extends Model{
  const SESSION = "User";

  public static function login($email, $password)
  {

    $sql = new Sql();

    $results = $sql->select("select * from users where email = :email", array(
      ":email"=>$email
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

  public static function verifyLogin()
  {
    if (
      !isset($_SESSION[User::SESSION])
      ||
      !$_SESSION[User::SESSION]
      ||
      !(int)$_SESSION[User::SESSION]["id"] > 0     
    ) {
      header("Location: /login");
      exit;
    }
  }

  public static function logout()
  {
    $_SESSION[User::SESSION] = null;
  }

  public static function listAll()
  {
    $sql = new Sql();

    $data = $sql->select("select * from users order by name");    

    $users = User::utf8_string_array_encode($data);

    return $users;
  }
  
  public function get($userId)
  {
    $sql = new Sql();

    $data = $sql->select("select * from users where id = :id ", array(
      ":id"=>$userId
    ));

    $user = $data[0];

    $user['name'] = utf8_encode($data['name']);

    $this->setData($user);
  }

  public function save()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $userId = $sql->insert("insert into users(name, email, password) values (:name, :email, :password) ", array(
      ":name"=>utf8_decode($this->getname()),
      ":email"=>$this->getemail(),
      ":password"=>$this->getpassword()
    ));

    $this->get($userId);

  }


  public function update()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $userId = $this->getid();

    $sql->query("update users set name = :name, email = :email, password = :password where id = :id ", array(
      ":name"=>utf8_decode($this->getname()),
      ":email"=>$this->getemail(),
      ":password"=>$this->getpassword(),
      ":id"=>$userId
    ));

    $this->get($userId);

  }

  public function delete()
  {
    $sql = new Sql();

    $sql->query("delete from users where id = :id ", array(
      ":id"=>$this->getid()
    ));   
  }

}

?>