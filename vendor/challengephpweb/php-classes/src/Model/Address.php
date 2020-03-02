<?php

namespace Cpw\Model;

use \Cpw\DB\Sql;
use \Cpw\Model;

class Address extends Model{
  public static function listAll($customerId)
  {
    $sql = new Sql();

    $data = $sql->select(" select * from addresses where customer_id = :customer_id ", array(
      ":customer_id"=>$customerId
    ));

    $addresses = Address::utf8_string_array_encode($data);

    return $addresses;
  }

  public function get($addressId)
  {
    $sql = new Sql();

    $data = $sql->select(" select * from addresses where id = :id ", array(
      ":id"=>$addressId
    ));

    $address = $data[0];
    $address['address'] = utf8_encode($address['address']);
    $address['complement'] = utf8_encode($address['complement']);
    $address['city'] = utf8_encode($address['city']);
    $address['state'] = utf8_encode($address['state']);
    $address['country'] = utf8_encode($address['country']);
    $address['zip_code'] = utf8_encode($address['zip_code']);
    
    $this->setData($address);
  }

  public function save()  {
    $sql = new Sql();

    /**
     * gets are dynamic
    */

    $addressId = $sql->insert("insert into addresses(customer_id, address, complement, city, state, country, zip_code) 
      "." values (:customer_id, :address, :complement, :city, :state, :country, :zip_code) ", array(
      ":customer_id"=>$this->getcustomer_id(),
      ":address"=>utf8_decode($this->getaddress()),
      ":complement"=>utf8_decode($this->getcomplement()),
      ":city"=>utf8_decode($this->getcity()),
      ":state"=>utf8_decode($this->getstate()),
      ":country"=>utf8_decode($this->getcountry()),
      ":zip_code"=>utf8_decode($this->getzip_code())
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
      ":address"=>utf8_decode($this->getaddress()),
      ":complement"=>utf8_decode($this->getcomplement()),
      ":city"=>utf8_decode($this->getcity()),
      ":state"=>utf8_decode($this->getstate()),
      ":country"=>utf8_decode($this->getcountry()),
      ":zip_code"=>utf8_decode($this->getzip_code()),
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