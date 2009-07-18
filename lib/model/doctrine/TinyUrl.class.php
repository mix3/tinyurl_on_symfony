<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TinyUrl extends BaseTinyUrl
{
  public function save(Doctrine_Connection $con = null){
    $this->setHash($this->getNewHash());
    return parent::save($con);
  }

  public function getNewHash(){
    $ctx = hash_init('md5');
    hash_update($ctx, $this->getUrl());
    $hash = substr(hash_final($ctx), 0, 6);
    while(Doctrine::getTable('TinyUrl')->findOneByUrl($hash)){
      hash_update($ctx, $this->getUrl());
      $hash = substr(hash_final($ctx), 0, 6);
    }
    return $hash;
  }
}