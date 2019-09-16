<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Testtable;

class NameTestController extends AbstractController
{
    /**
     * @Route("/bonjour", name="name_test")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Testtable::class);
        $lesTests = $repository->findAll();
        if ($lesTests == null) {
            $this->setTests();
        }
        return $this->render('name_test/index.html.twig', [
            'resultats' => $this->getTests(),
        ]);
    }
    
    public function setTests() {
/*        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Testtable::class);
        $lesAnciensTests = $repository->findAll();
        foreach ($lesAnciensTests as $ancienTest) {
           $entityManager->remove($ancienTest);
        }
        $entityManager->flush();*/
        
        $test = new Testtable();
        $test->setNom("Leblond");
        $test->setPrenom("Paul");
        $test->setAdresse("La Creuse");
        $test->setAge(23);
        $entityManager->persist($test);
        $entityManager->flush();
        $test1 = new Testtable();
        $test1->setNom("Lechatain");
        $test1->setPrenom("Gérard");
        $test1->setAdresse("Pays Basques");
        $test1->setAge(18);
        $entityManager->persist($test1);
        $entityManager->flush();
        $test2 = new Testtable();
        $test2->setNom("Leroux");
        $test2->setPrenom("Nicolas");
        $test2->setAdresse("Paris");
        $test2->setAge(35);
        $entityManager->persist($test2);
        $entityManager->flush();
    }
    
    public function getTests() {
        $lesTests = $this->getDoctrine()->getRepository(Testtable::class)->findAll();
        return $lesTests;
    }
}
