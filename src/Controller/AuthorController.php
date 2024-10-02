<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{

     public $authors = array(
        array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
        'victor.hugo@gmail.com ', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
        ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
        'taha.hussein@gmail.com', 'nb_books' => 300),
        );//variable globale : il devient similaire lel $render


    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/showauthor', name: 'app_showauthor')]
    public function showauthor(): Response
    {
        // Corrected this part to reference the authors array
        return $this->render('author/showauthor.html.twig', [
            'tabauthor' => $this->authors,
        ]);
    }

       #[Route('/authorDetails', name: 'author_details')]
 
    public function authorDetails($id): Response
{     #ill faut definir le tableau comme variable globale


    $author=null;
    foreach($this->authors as $element)
    {
        //$element[] khatrou chaire de caractere ethekaalech zedna []
        if($element['id']==$id)
        {
            $author=$element;
        }
    };
     return $this->render('author/authorDetails.html.twig', [
            'author' => $author,
        ]);
}



}
