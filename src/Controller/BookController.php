<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }



    #[Route('/show', name: 'app_book')]
    public function show(): Response
    {
        $book =$rep->findall();
        return $this->render('book/index.html.twig', [
            'tabook' => $book,
        ]);
    }
}
