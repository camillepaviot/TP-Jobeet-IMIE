<?php

namespace Ens\JoobetBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController as Controller;
use Doctrine\ORM\EntityManager;
use Ens\JoobetBundle\Entity\Product;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class RestProductController extends Controller
{
    /**
     * @ApiDoc(resource=true,
     * section="Rest CRUD Product",
     * description="Show entity",
     * )
     * @param type $id
     * @return type
     */
    public function getProductAction($id){
        $entityManager = $this->getDoctrine()->getManager();
        
        $product = $entityManager->getRepository('EnsJobeetBundle:Product')->findOneById($id);
        
        if($product){
            $view = $this->view($product, 200);
        }
        else{
            $view = $this->view("", 404);
        }
        
        return $this->handleView($view);
    }
    
    public function getProductsAction(){
        $entityManager = $this->getDoctrine()->getManager();
        
        $product = $entityManager->getRepository('EnsJobeetBundle:Product')->findAll();
        
        if($product){
            $view = $this->view($product, 200);
        }
        else{
            $view = $this->view("", 404);
        }
        
        return $this->handleView($view);
    }
    
    /**
     * Create a product
     * @ApiDoc(resource=true,
     * section="Rest CRUD Product",
     * description="Create entity",
     * statusCodes={
     * 200 = "returned when succesful product is created",
     * 404 = "returned when product is not created",
     * 400 = "returned when the form has error"
     * },
     * input = "Ens\JoobetBundle\Entity\Product",
     * output = "Ens\JoobetBundle\Entity\Product",
     * )
     */
    public function postProductAction(){
        $product = new Product();
        
        $json = json_decode($this->getRequest()->getContent(), true);
        
        $this->extract($product, $json);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->flush();
        
        $view = $this->view($product, 200);
        
        return $this->handleView($view);
    }
    
    public function extract(Product $product, $json){
        if($json){
            if(array_key_exists("name", $json)){
                $product->setName($json["name"]);
            }
            if(array_key_exists("price", $json)){
                $product->setPrice($json["price"]);
            }
            if(array_key_exists("description", $json)){
                $product->setDescription($json["description"]);
            }
        }
    }
}