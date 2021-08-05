<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainpageController extends AbstractController
{
    #[Route('/mainpage', name: 'mainpage')]
    public function index(): Response
    {
        return $this->render('mainpage/index.html.twig', [
            'controller_name' => 'MainpageController',
        ]);
    }
}
