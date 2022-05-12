<?php

namespace App\Controller;
use App\Entity\Entreprise;
use App\Entity\PFE;
use App\Form\PFEType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PfeController extends AbstractController
{
    #[Route('/pfe/add', name: 'app_pfe')]

    public function addPfe(ManagerRegistry $doctrine,Request $request): Response
    {

        $pfe = new PFE();

        $form = $this->createForm(PFEType::class,$pfe);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $managaer = $doctrine->getManager();
            $managaer->persist($pfe);
            $managaer->flush();
            return $this->render('pfe/index2.html.twig', [
                'pfe'=>$pfe

            ]);





        }
        else {
            return $this->render('pfe/index.html.twig', [
                'form'=>$form->createView()

            ]);

        }
    }

    #[Route('/all' , name: 'app_all')]
    public function indexAll(ManagerRegistry $doctrine ) : Response {
        $repository = $doctrine->getRepository(Entreprise::class);


        $entreprise = $repository->findAll();
        return $this->render('pfe/index1.html.twig',[
            'entreprises' =>$entreprise


        ]);

    }







}
