<?php

namespace Cpw\Model;

use \Cpw\DB\Sql;
use \Cpw\Model;

class Address extends Model{
  public static function listAll($customerId)
  {
    $sql = new Sql();

    return $sql->select(" select * from addresses where customer_id = :customer_id ", array(
      ":customer_id"=>$customerId
    ));    
  }

  public function get($addressId)
  {
    $sql = new Sql();

    $address = $sql->select(" select * from addresses where id = :id ", array(
      ":id"=>$addressId
    ));
    
    $this->setData($address[0]);
  }

  public function save()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $addressId = $sql->insert("insert into addresses(customer_id, address, complement, city, state, country, zip_code) 
      "." values (:customer_id, :address, :complement, :city, :state, :country, :zip_code) ", array(
      ":customer_id"=>$this->getcustomer_id(),
      ":address"=>$this->getaddress(),
      ":complement"=>$this->getcomplement(),
      ":city"=>$this->getcity(),
      ":state"=>$this->getstate(),
      ":country"=>$this->getcountry(),
      ":zip_code"=>$this->getzip_code()
    ));

    $this->get($addressId);

  }


  public function update()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $addressId = $this->getid();

    $sql->query("update addresses set customer_id = :customer_id, address = :address, complement = :complement, 
      "." city = :city, state = :state, country = :country, zip_code = :zip_code
      "." where id = :id ", array(
      ":customer_id"=>$this->getcustomer_id(),
      ":address"=>$this->getaddress(),
      ":complement"=>$this->getcomplement(),
      ":city"=>$this->getcity(),
      ":state"=>$this->getstate(),
      ":country"=>$this->getcountry(),
      ":zip_code"=>$this->getzip_code(),
      ":id"=>$addressId
    ));

    $this->get($addressId);


  }

  public function delete()
  {
    $sql = new Sql();

    $sql->query("delete from addresses where id = :id ", array(
      ":id"=>$this->getid()
    ));
   
  }

}

?>