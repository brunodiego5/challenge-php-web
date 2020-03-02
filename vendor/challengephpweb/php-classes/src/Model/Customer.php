<?php

namespace Cpw\Model;

use \Cpw\DB\Sql;
use \Cpw\Model;

class Customer extends Model{
  public static function listAll()
  {
    $sql = new Sql();

    return $sql->select(" select * from customers order by name");    
  }

  public function get($customerId)
  {
    $sql = new Sql();

    $customer = $sql->select(" select * from customers where id = :id ", array(
      ":id"=>$customerId
    ));

    $this->setData($customer[0]);
  }

  public function save()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $customerId = $sql->insert("insert into customers(name, date_birth, cpf, rg, phone) values (:name, :date_birth, :cpf, :rg, :phone) ", array(
      ":name"=>$this->getname(),
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
      ":name"=>$this->getname(),
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

}

?>