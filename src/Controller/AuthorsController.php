<?php

namespace App\Controller;
// 1er etape
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AuthorRepository;
use App\Entity\Author;
use App\Form\AuthorType;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;// hethi zedna



//awel etape bech naam l affichage a  trvers chnowa chnaaml :
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
    public function addauthors(ManagerRegistry $m): Response
    { 
      
        $em=$m->getManager();//pour la securite 


        $author = new Author();
        $author->setUsername("3A43");

        
        $em->persist($author);
        $em->flush();

        return $this->redirectToRoute('app_showauthors');
    }





    #[Route('/updateformauthors/{id}', name: 'app_updateformauthors')]
    public function updateformauthors(Request $request,AuthorRepository $ref ,ManagerRegistry $m ): Response
    
    { 
         
        $em=$m->getManager();//pour la securite 
    
       $author = $ref->find($id);
        
    
        
        $form= $this->createForm(AuthorType::class,$author );
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($author);
                $em->flush();
    
                return $this->redirectToRoute('app_showauthors'); // Add a redirect after saving
            }
            return $this->render('authors/addForm.html.twig', [
                'addform' => $form->createView(), // Make sure to call createView()
            ]);
        }
    


    #[Route('/deleteauthors/{id}', name: 'app_deleteauthors')]
    public function deleteauthors(Request $request,AuthorRepository $ref ,ManagerRegistry $m ): Response
    
    { 
     
        $em=$m->getManager();//pour la securite 
    
       $author = $ref->find($id);
        
    
     
                $em->persist($author);
                $em->flush();
    
                return $this->redirectToRoute('app_showauthors'); // Add a redirect after saving
            
            
        }




}
