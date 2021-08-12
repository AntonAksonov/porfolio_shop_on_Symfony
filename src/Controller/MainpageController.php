<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class MainpageController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(Product::class)->findAll();
        //dd($products);
        return $this->render('mainpage/index.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     *Route("/product/{id<\d+>}", name ="product")
     * @param int $id
     * @return Response
     */
    public function product(int $id): Response
    {
        return $this->render('mainpage/product.html.twig', [
            'controller_name' => 'MainpageController'.$id,

        ]);
    }

    #[Route('/cart', name: 'cart')]
    public function cart(): Response
    {
        return $this->render('mainpage/cart.html.twig', [
            'controller_name' => 'MainpageController',
        ]);
    }

    #[Route('/order', name: 'order')]
    public function order(): Response
    {
        return $this->render('mainpage/order.html.twig', [
            'controller_name' => 'MainpageController',
        ]);
    }

    #[Route('/confirm', name: 'cofirm')]
    public function confirm(): Response
    {
        return $this->render('mainpage/confirm.html.twig', [
            'controller_name' => 'MainpageController',
        ]);
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('mainpage/login.html.twig', [
            'controller_name' => 'MainpageController',
        ]);
    }
//    #[Route('/add-product', name: 'add_product')]
//
//    public function addProduct()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $product = new Product();
//        $product->setDescription("ssdf");
//        $product->setName("dfsfds");
//        $product->setPrice(33);
//        $product->setSKU(43);
//        $product->setStock("in");
//        $product->setImg("Sds");
//
//        $em->persist($product);
//        $em->flush();
//
//        return $this->render('mainpage/cart.html.twig', [
//            'controller_name' => 'MainpageController',
//        ]);
//    }


}
