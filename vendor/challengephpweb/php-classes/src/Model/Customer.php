<?php

namespace Cpw\Model;

use \Cpw\DB\Sql;
use \Cpw\Model;

class Customer extends Model{
  public static function listAll()
  {
    $sql = new Sql();

    $data = $sql->select(" select * from customers order by name");    

    $customers = Customer::utf8_string_array_encode($data);

    return $customers;
  }

  public function get($customerId)
  {
    $sql = new Sql();

    $data = $sql->select(" select * from customers where id = :id ", array(
      ":id"=>$customerId
    ));

    $customer = $data[0];
    $customer['name'] = utf8_encode($customer['name']);

    $this->setData($customer);
  }

  public function save()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $customerId = $sql->insert("insert into customers(name, date_birth, cpf, rg, phone) values (:name, :date_birth, :cpf, :rg, :phone) ", array(
      ":name"=>utf8_decode($this->getname()),
      ":date_birth"=>$this->getdate_birth(),
      ":cpf"=>$this->getcpf(),
      ":rg"=>$this->getrg(),
      ":phone"=>$this->getphone()
    ));

    $this->get($customerId);

  }


  public function update()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $customerId = $this->getid();

    $sql->query("update customers set name = :name, date_birth = :date_birth, cpf = :cpf, rg = :rg, phone = :phone where id = :id ", array(
      ":name"=>utf8_decode($this->getname()),
      ":date_birth"=>$this->getdate_birth(),
      ":cpf"=>$this->getcpf(),
      ":rg"=>$this->getrg(),
      ":phone"=>$this->getphone(),
      ":id"=>$customerId
    ));

    $this->get($customerId);


  }

  public function delete()
  {
    $sql = new Sql();

    $sql->query("delete from customers where id = :id ", array(
      ":id"=>$this->getid()
    ));
   
  }

  public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM customers ORDER BY name LIMIT $start, $itemsPerPage;");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

  }
  
  public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM customers 
      WHERE name LIKE :search OR cpf LIKE :search OR rg LIKE :search OR phone LIKE :search ORDER BY name LIMIT $start, $itemsPerPage;
        ", [
          ':search' =>'%'.$search.'%'
        ]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


}

?>