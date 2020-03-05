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
      $_SESSION['loginError'] = "Usuário inexistente ou senha inválida.";
      header("Location: /login");
      exit;
    }

    $data = $results[0];

    if (password_verify($password, $data["password"]) === true)
    {
      
      $user = new User();

      $user->setData($data);

      $_SESSION[User::SESSION] = $user->getValues();

      return $user;
 
    } else {
      $_SESSION['loginError'] = "Usuário inexistente ou senha inválida.";
      header("Location: /login");
      exit;
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

  public static function getFromSession()
	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['id'] > 0) {

			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}

  
  public function get($userId)
  {
    $sql = new Sql();

    $data = $sql->select("select * from users where id = :id ", array(
      ":id"=>$userId
    ));

    $user = $data[0];

    $user['name'] = utf8_encode($user['name']);

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

    $_SESSION['registerSaved'] = "Registro salvo com sucesso.";

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

    $_SESSION['registerSaved'] = "Registro salvo com sucesso.";

    $this->get($userId);

  }

  public function delete()
  {
    $sql = new Sql();

    $sql->query("delete from users where id = :id ", array(
      ":id"=>$this->getid()
    ));   

    $_SESSION['registerDeleted'] = "Registro excluído com sucesso.";
  }

  public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM users ORDER BY name LIMIT $start, $itemsPerPage;");

    $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

    $users = User::utf8_string_array_encode($results);

		return [
			'data'=>$users,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

  }
  
  public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM users 
      WHERE name LIKE :search OR email LIKE :search ORDER BY name LIMIT $start, $itemsPerPage;
        ", [
          ':search' =>'%'.$search.'%'
        ]);

    $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
    
    $users = User::utf8_string_array_encode($results);

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


}

?>