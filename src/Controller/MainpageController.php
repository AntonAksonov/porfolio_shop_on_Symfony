<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainpageController extends AbstractController
{
//    /**
//     * @Route("/, name="home")
//     */
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('mainpage/index.html.twig', [
            'controller_name' => 'MainpageController',
        ]);
    }
    #[Route('/goods', name: 'goods')]
    public function goods(): Response
    {
        $goods = [
            [
                'id' => 1,
                'name' => 'batter lavander',
                'SKU' => '1',
                'stock' => 'in stock',
                'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium',
                'img' => '/images/goods/butter.jpg',
                'price' => '10',
                'link' => '<a href="/goods.php">link</a>'
            ],
            [
                'id' => 2,
                'name' => 'batter lemon',
                'SKU' => '2',
                'stock' => 'out of stock',
                'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium',
                'img' => '/images/goods/butter.jpg',
                'price' => '15',
                'link' => '<a href="/goods.php">link</a>'
            ],
            [
                'id' => 3,
                'name' => 'batter tea oil',
                'SKU' => '3',
                'stock' => 'pre order',
                'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium',
                'img' => '/images/goods/butter.jpg',
                'price' => '20',
                'link' => '<a href="/goods.php">link</a>'
            ],
            [
                'id' => 4,
                'name' => 'oil',
                'SKU' => '4',
                'stock' => 'in stock',
                'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium',
                'img' => '/images/goods/butter.jpg',
                'price' => '30',
                'link' => '<a href="/goods.php">link</a>'
            ],
        ];


        return $this->render('mainpage/goods.html.twig', [
            'controller_name' => 'MainpageController',
            'data' => $goods
        ]);
    }
    #[Route('/product', name: 'product')]
    public function product(): Response
    {
        return $this->render('mainpage/product.html.twig', [
            'controller_name' => 'MainpageController',
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
}
