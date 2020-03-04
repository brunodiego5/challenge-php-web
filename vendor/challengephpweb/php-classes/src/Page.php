<?php

namespace Cpw;

use Rain\Tpl;

class Page {
  private $name;
  private $tpl;
  private $options = [];
  private $defaults = [
    "header"=>true,
    "footer"=>true,
    "data"=>[]
  ];

  public function __construct($namePage, $opts = array(), $tpl_dir = "/views/")
  {
    $this->options = array_merge($this->defaults, $opts);
    $this->name = $namePage;

    // config
    $config = array(
      "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir, 
      "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
      "debug"         => false // set to false to improve the speed
      );

    Tpl::configure( $config );    

    
    // create the Tpl object
    $this->tpl = new Tpl;

    $this->setData($this->options["data"]);

    $this->setData(array(
      "pagename"=>$this->name
    ));

    if ($this->options["header"] === true)
    {
      $this->tpl->draw("header");
    }
  }

  private function setData($data = array()){
    foreach ($data as $key => $value) {
      $this->tpl->assign($key, $value);
    }

  }

  public function setTpl($data = array(), $returnHTML = false)
  {
    $this->setData($data);

    return $this->setPage($this->name, $returnHTML);
  }

  public function setPage($namepage, $returnHTML = false)
  {
    return $this->tpl->draw($namepage, $returnHTML);
  }


  public function __destruct()
  {
    if ($this->options["footer"] === true)
    {
      $this->tpl->draw("footer");
    }
  }
}

?>