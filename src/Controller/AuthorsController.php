<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AuthorRepository;
use App\Entity\Author;



class AuthorsController extends AbstractController
{
    #[Route('/authors', name: 'app_authors')]
    public function index(): Response
    {
        return $this->render('authors/index.html.twig', [
            'controller_name' => 'AuthorsController',
        ]);
    }

    #[Route('/showauthors', name: 'app_showauthors')]
    public function showauthors(AuthorRepository $authorrep): Response
    {
        //Cette variable pour stocker les var de la bd
        $authordatabd =$authorrep->findAll();
        return $this->render('authors/showauthors.html.twig', [
            'tab' => $authordatabd,
        ]);
    }


    #[Route('/addauthors', name: 'app_addauthors')]
    public function addauthors(): Response
    {
        $author = new Author();
        return $this->render('authors/index.html.twig', [
            'controller_name' => 'AuthorsController',
        ]);
    }

}
