<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpenProductController extends AbstractController
{
    #[Route('/open/product', name: 'open_product')]
    public function index(): Response
    {
        return $this->render('open_product/index.html.twig', [
            'controller_name' => 'OpenProductController',
        ]);
    }
}
