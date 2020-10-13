<?php
namespace AppBundle\Contract\Service;

interface CrudProductServiceInterface{
  public function create();
  public function read();
  public function update();
  public function delete();
}