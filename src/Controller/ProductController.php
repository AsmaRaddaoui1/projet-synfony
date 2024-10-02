<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }


    #[Route('/showbyid/{id}', name: 'showbyidx')]
    public function showbyidx($id): Response
    {
        // var_dump($id).die(); //A revoir : stop a cette etape 
        return $this->render('product/showproduct.html.twig', [
            'id' => '$id',
        ]);
    }




    #[Route('/showproduct', name: 'app_showproduct')]
    public function showproduct(): Response
    {


        $name="bonjour";


        return $this->render('product/showproduct.html.twig', [
            'nameshow' => '$name',
        ]);
    }



    #[Route('/message', name: 'app_product_message')]
    public function messagesimple(): Response
    {
        
        return $this->render('product/message.html.twig', [
            '' => 'ProductController',
        ]);
    }






}




