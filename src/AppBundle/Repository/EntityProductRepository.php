<?php
namespace AppBundle\Repository;

use AppBundle\Contract\Repository\ProductRepoInterface;

Class EntityProductRepository implements  ProductRepoInterface {

  public function create()
  {
    // TODO: Implement create() method.
    return 'Doctrine create';
  }

  public function read()
  {
    return 'Doctrine read';
    // TODO: Implement read() method.
  }

  public function update()
  {
    return 'Doctrine update';
    // TODO: Implement update() method.
  }

  public function delete()
  {
    return 'Doctrine delete';
    // TODO: Implement delete() method.
  }
}
