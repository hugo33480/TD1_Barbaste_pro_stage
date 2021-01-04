<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage")
     */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig');
    }

    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function afficherEntreprises(): Response
    {
        return $this->render('pro_stage/afficherEntreprises.html.twig');
    }

    /**
     * @Route("/Formations", name="formations")
     */
    public function afficherFormations(): Response
    {
        return $this->render('pro_stage/afficherFormations.html.twig');
    }

    /**
     * @Route("/stage/{id}", name="descriptionStage")
     */
    public function afficherDescriptifStage($id): Response
    {
        return $this->render('pro_stage/afficherDescriptifStage.html.twig',
      ['idStage' => $id]);
    }
}
