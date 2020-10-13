<?php
namespace AppBundle\Services;
use AppBundle\Contract\Service\CrudProductServiceInterface;
use AppBundle\Contract\Repository\ProductRepoInterface;

Class CrudProductService implements  CrudProductServiceInterface {

  private $repo;
  public function __construct(ProductRepoInterface $repo)
  {
    $this->repo=$repo;

  }

  public function create()
  {
    // TODO: Implement create() method.
    return 'create'.$this->repo->create();
  }

  public function read()
  {
    return 'read'.$this->repo->read();
    // TODO: Implement read() method.
  }

  public function update()
  {
    return 'update'.$this->repo->update();
    // TODO: Implement update() method.
  }

  public function delete()
  {
    return 'delete'.$this->repo->delete();
    // TODO: Implement delete() method.
  }
}
