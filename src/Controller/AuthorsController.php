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
    // AuthorRepository $authorrep : instance: c'est une injection dependance c'est importatnte a utiliser ce mot 
    // ena manjmch  naacidi toul AuthorRepository  so ayatelha b variable  $authorrep
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
        // el manager houa el chef d'orchestre
        //fama 2types de managerregester fama el persistance eli ki naamlou mnjmch nekhdm vchy w fama el type el repository
        //pour la securite 
        $em=$m->getManager();//pour la securite 


        $author = new Author();
        //hethi ki nhb nnekhdem manuellement ena nsettihom
        $author->setUsername("3A43"); // hata hethi zeda maaha 

        
        // et taamelha el repository
        //el bekj yaamlou el manager register il faut l'appeler

        //jebna el manger regisyry w el em el ft nwali nekhdemha b sve ama ahna chnkhdlmou bhaja okhra
        $em->persist($author);
        $em->flush(); //les deux fcts hethom manccedilhom kn bel manager register : cette methode est statique : inajem ikoli 

        return $this->redirectToRoute('app_showauthors');
    }





    #[Route('/updateformauthors/{id}', name: 'app_updateformauthors')]
    public function updateformauthors(Request $request,AuthorRepository $ref ,ManagerRegistry $m ): Response
    
    { 
        // el manager houa el chef d'orchestre
        //fama 2types de managerregester fama el persistance eli ki naamlou mnjmch nekhdm vchy w fama el type el repository
        //pour la securite 
        $em=$m->getManager();//pour la securite 
    
       $author = $ref->find($id);
        
    
        //hethi ki nhb nnekhdem manuellement ena nsettihom
        //$author->setUsername("3A43"); // hata hethi zeda maaha 
        $form= $this->createForm(AuthorType::class,$author );
        //AuthorType::class aamlna class bech yefhm eli heya mech string
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
        // el manager houa el chef d'orchestre
        //fama 2types de managerregester fama el persistance eli ki naamlou mnjmch nekhdm vchy w fama el type el repository
        //pour la securite 
        $em=$m->getManager();//pour la securite 
    
       $author = $ref->find($id);
        
    
     
                $em->persist($author);
                $em->flush();
    
                return $this->redirectToRoute('app_showauthors'); // Add a redirect after saving
            
            
        }




}
// bech nasnaa formulaire : php bin/console make:form  nhot esem el form w emb3ed esme el entity kifma heya maktouba
