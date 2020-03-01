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

  public static function listAll()
  {
    $sql = new Sql();

    return $sql->select(" select u.id, u.people_id, u.login, u.password, u.isadmin, " . 
      " p.name, p.email, p.rg, p.cpf, p.date_birth, p.phone " .  
      " from db_challenge_php_web.users u inner " .
      " join db_challenge_php_web.people p on p.id = u.people_id order by p.name");    
  }

  public function save()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $personId = $sql->insert("insert into people(name, email) values (:name, :email)", array(
      ":name"=>$this->getname(), 
      ":email"=>$this->getemail()
    ));

   
    $userId = $sql->insert("insert into users(people_id, login, password, isadmin) values (:people_id, :login, :password, :isadmin) ", array(
      ":people_id"=>$personId,
      ":login"=>$this->getlogin(),
      ":password"=>$this->getpassword(),
      ":isadmin"=>$this->getisadmin()
    ));

    $user = $sql->select("select u.id, u.people_id, u.login, u.password, u.isadmin, " . 
    " p.name, p.email, p.rg, p.cpf, p.date_birth, p.phone " .  
    " from db_challenge_php_web.users u inner " .
    " join db_challenge_php_web.people p on p.id = u.people_id where u.id = :id ", array(
      ":id"=>$userId
    ));

    $this->setData($user[0]);

  }

  public function get($userId)
  {
    $sql = new Sql();

    $user = $sql->select("select u.id, u.people_id, u.login, u.password, u.isadmin, " . 
    " p.name, p.email, p.rg, p.cpf, p.date_birth, p.phone " .  
    " from db_challenge_php_web.users u inner " .
    " join db_challenge_php_web.people p on p.id = u.people_id where u.id = :id ", array(
      ":id"=>$userId
    ));

    $this->setData($user[0]);
  }

  public function update()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $sql->query("update people set name = :name, email = :email where id = :id", array(
      ":name"=>$this->getname(), 
      ":email"=>$this->getemail(),
      ":id"=>$this->getpeople_id()
    ));

   
    $sql->query("update users set login = :login, password = :password, isadmin = :isadmin where id = :id ", array(
      ":login"=>$this->getlogin(),
      ":password"=>$this->getpassword(),
      ":isadmin"=>$this->getisadmin(),
      ":id"=>$this->getid()
    ));

    $user = $sql->select("select u.id, u.people_id, u.login, u.password, u.isadmin, " . 
    " p.name, p.email, p.rg, p.cpf, p.date_birth, p.phone " .  
    " from db_challenge_php_web.users u inner " .
    " join db_challenge_php_web.people p on p.id = u.people_id where u.id = :id ", array(
      ":id"=>$this->getid()
    ));

    $this->setData($user[0]);

  }

  public function delete()
  {
    $sql = new Sql();

    $sql->query("delete from users where id = :id ", array(
      ":id"=>$this->getid()
    ));

    $sql->query("delete from people where id = :id", array(
      ":id"=>$this->getpeople_id()
    ));
   
  }

}

?>