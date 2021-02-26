<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage")
     */
    public function index(): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les ressources enregistrées en BD
        $stages = $repositoryStage->findAll();
        return $this->render('pro_stage/index.html.twig',['stages'=>$stages]);
    }

    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function afficherEntreprises(): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les ressources enregistrées en BD
        $stages = $repositoryStage->findAll();
        return $this->render('pro_stage/afficherEntreprises.html.twig',['stages'=>$stages]);
    }

    /**
     * @Route("/stageE/{nomEntreprise}", name="stagesParEntreprise")
     */
    public function afficherStagesParEntreprises($nomEntreprise): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les ressources enregistrées en BD
        $stages = $repositoryStage->findByEntreprise($nomEntreprise);
        return $this->render('pro_stage/afficherStagesParEntreprises.html.twig',['stages'=>$stages]);
    }

    /**
     * @Route("/Formations", name="formations")
     */
    public function afficherFormations(): Response
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

        // Récupérer les ressources enregistrées en BD
        $formations = $repositoryFormation->findAll();
        return $this->render('pro_stage/afficherFormations.html.twig',['formations' => $formations]);
    }

    /**
     * @Route("/stageF/{nomFormation}", name="stagesParFormation")
     */
    public function afficherStagesParFormation($nomFormation): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        // Récupérer les ressources enregistrées en BD
        $stages = $repositoryStage->findByFormation($nomFormation);
        return $this->render('pro_stage/afficherStagesParFormation.html.twig',['stages'=>$stages]);
    }

    /**
     * @Route("/stage/{id}", name="descriptionStage")
     */
    public function afficherDescriptifStage($id): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les ressources enregistrées en BD
        $stage = $repositoryStage->find($id);
        return $this->render('pro_stage/afficherDescriptifStage.html.twig',
      ['stage' => $stage]);
    }



    /**
     * @Route("/entreprise/ajouter", name="ajouterEntreprise")
     */
    public function ajouterEntreprise(): Response
    {
    // Création d'une ressource initialement vierge
    $entreprise = new Entreprise ();

    // création d'un objet formulaire pour saisir une ressource
    $formulaireEntreprise = $this -> createFormBuilder ($entreprise)
                                 -> add ('nom')
                                 -> add ('activite')
                                 -> add ('adresse')
                                 -> add ('site')
                                 -> getForm ();


      return $this->render('pro_stage/ajouterEntreprise.html.twig',['$vueFormulaireEntreprise' => $formulaireEntreprise -> createView()]);
  }

}
