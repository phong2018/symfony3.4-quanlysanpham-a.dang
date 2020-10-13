<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Contract\Service\CrudProductServiceInterface;

/**
 * @Route("product")
 */
class ProductController extends Controller
{
  private $crubservice;
  public function __construct(CrudProductServiceInterface $crubservice)
  {
    $this->crubservice=$crubservice;
  }

  /**
   * @Route("/create", name="product_create")
   */
  public function createAction(Request $request)
  {
    return new Response('<html><body>PRODUCT PAGE!'.$this->crubservice->create().'</body></html>');
  }
  /**
   * @Route("/update", name="product_update")
   */
  public function updateAction(Request $request)
  {
    return new Response('<html><body>PRODUCT PAGE!'.$this->crubservice->update().'</body></html>');
  }
  /**
   * @Route("/read", name="product_read")
   */
  public function readAction(Request $request)
  {
    return new Response('<html><body>PRODUCT PAGE!'.$this->crubservice->read().'</body></html>');
  }
  /**
   * @Route("/delete", name="product_delete")
   */
  public function deleteAction(Request $request)
  {
    return new Response('<html><body>PRODUCT PAGE!'.$this->crubservice->delete().'</body></html>');
  }
}