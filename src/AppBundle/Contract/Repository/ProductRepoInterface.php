<?php
namespace AppBundle\Contract\Repository;

interface ProductRepoInterface{
  public function create();
  public function read();
  public function update();
  public function delete();
}