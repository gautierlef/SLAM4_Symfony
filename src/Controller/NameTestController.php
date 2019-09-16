<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class NameTestController extends AbstractController
{
    /**
     * @Route("/bonjour", name="name_test")
     */
    public function index()
    {
        return new Response("<h1 style=\"text-decoration: underline;\">Bonjour tout le monde!<h1/>");
/*        return $this->render('name_test/index.html.twig', [
            'controller_name' => 'NameTestController',
        ]);*/
    }
}
