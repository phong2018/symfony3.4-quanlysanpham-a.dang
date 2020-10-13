<?php
namespace AppBundle\Repository;

use AppBundle\Contract\Repository\ProductRepoInterface;

Class ApiProductRepository implements  ProductRepoInterface {

  public function create()
  {
    // TODO: Implement create() method.
    return 'API create';
  }

  public function read()
  {
    return 'Doctrine read';
    // TODO: Implement read() method.
  }

  public function update()
  {
    return 'API update';
    // TODO: Implement update() method.
  }

  public function delete()
  {
    return 'API delete';
    // TODO: Implement delete() method.
  }
}
