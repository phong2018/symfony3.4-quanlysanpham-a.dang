<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Category;
use AppBundle\Form\CategoryType;


/**
 * @Route("category")
 */
class CategoryController extends Controller
{
   /**
   * @Route("/hlct", name="categorypage")
   */
  public function index1Action(Request $request)
  {
    return new Response('<html><body>CATEGORY PAGE!</body></html>');
  }


  /**
   * Lists all category entities.
   *
   * @Route("/", name="category_index")
   * @Method("GET")
   * @Template()
   */

  public function indexAction()
  {
    $em = $this->getDoctrine()->getManager();
    $categories = $em->getRepository('AppBundle:Category')->findAll();
    return ['categories' => $categories];
    //return new Response('<html><body>CATEGORY PAGE!</body></html>');
  }

  /**
   * Creates a new category entity.
   *
   * @Route("/new", name="category_new")
   * @Method({"GET", "POST"})
   * @Template()
   */
  public function newAction(Request $request)
  {
    $category = new Category();
    $form = $this->createForm(CategoryType::class, $category);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $category= $form->getData();
      $em->persist($category);
      $em->flush($category);
      return $this->redirectToRoute('category_index');
    }
    return $this->render('@App/Category/new.html.twig', array(
      'category' => $category,
      'form' => $form->createView(),
    ));

  }
  /**
   * @Route("/{id}/edit", name="category_edit")
   * @Method({"GET", "POST"})
   * @Template()
   */
  public function editAction(Request $request, Category $category)
  {
    $editForm = $this->createForm(CategoryType::class, $category);
    $editForm->handleRequest($request);
// xử lý submit
    if ($editForm->isSubmitted() && $editForm->isValid()) {

//lưu vào db
      $this->getDoctrine()->getManager()->flush();

// chuyển đến trang edit xem lại
      return $this->redirectToRoute('category_edit', array('id' => $category->getId()));
    }
    return $this->render('@App/Category/edit.html.twig', array(
      'category' => $category,
      'edit_form' => $editForm->createView(),
    ));
  }

  /**
   * Finds and displays a category entity.
   *
   * @Route("/{id}", name="category_show")
   * @Method("GET")
   * @Template()
   */
  public function showAction(Category $category)
  {
    $deleteForm =$this->createDeleteForm($category);

    return [
      'category' => $category,
      'delete_form' => $deleteForm->createView()
    ];
  }

  /**
   * Deletes a category entity.
   *
   * @Route("/del/{id}", name="category_delete")
   * @Method("DELETE")
   */
  public function deleteAction(Request $request, Category $category)
  {
    $form = $this->createDeleteForm($category);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->remove($category);
      $em->flush();
    }
    return $this->redirectToRoute('category_index');
  }

  /**
   * Creates a form to delete a category entity.
   *
   * @param Category $category The category entity
   *
   * @return \Symfony\Component\Form\Form The form
   */
  private function createDeleteForm(Category $category)
  {
    return $this->createFormBuilder()
      ->setAction($this->generateUrl('category_delete', array('id' => $category->getId())))
      ->setMethod('DELETE')
      ->getForm()
      ;
  }


}
