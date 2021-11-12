<?php

namespace App\Controller;

use App\Entity\ShopItems;
use App\Entity\ShopCart;
use App\Entity\ShopOrder;
use App\Form\OrderFormType;
use App\Repository\ShopCartRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class MainpageController extends AbstractController
{
    private SessionInterface $session;

    /**
     * IndexController constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
            $this->session->start();

            $this->session->set('flag', '1');
    }


//    #[Route('/', name: 'home')]
    /**
     * @Route("/home", name="home")
     *
     *
     */
    public function index(): Response
    {

        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(ShopItems::class)->findAll();
        return $this->render('mainpage/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/product/{id}', name: "product")]
    public function product(int $id): Response
    {

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(ShopItems::class)->find($id);
        return $this->render('mainpage/product.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/shop/cart/add/{id<\d+>}", name="shopAddToCart")
     *
     * @param ShopItems $shopItems
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function shopAddToCart(ShopItems $shopItems, EntityManagerInterface $em): Response
    {
        $sessionId = $this->session->getId();
        $shopCart = (new ShopCart())
            ->setShopItem($shopItems)
            ->setCount(1)
            ->setSessionId($sessionId);
        //dd($sessionId);
        $em->persist($shopCart);
        $em->flush();

        return $this->redirectToRoute('cart', ['id' => $shopItems->getId()]);
    }

    /**
     * @Route("/cart", name="cart")
     *
     * @param ShopCartRepository $shopCartRepository
     * @return Response
     */
    public function cart(ShopCartRepository $shopCartRepository): Response
    {
        $session = $this->session->getId();
        $items = $shopCartRepository->findBy(['sessionId' => $session]);
        return $this->render('mainpage/cart.html.twig', [
            'items' => $items,
        ]);
    }

    #[Route('/order', name: 'order')]
    public function order(): Response
    {
        return $this->render('mainpage/order.html.twig', [
            'controller_name' => 'MainpageController',
        ]);
    }

    /**
     * @Route("/order", name="order")
     *
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function shopOrder(Request $request, EntityManagerInterface $em): Response
    {

        $shopOrder = new ShopOrder();

        $form = $this->createForm(OrderFormType::class, $shopOrder);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $shopOrder = $form->getData();

            if ($shopOrder instanceof ShopOrder) {
                $sessionId = $this->session->getId();
                $shopOrder->setStatus(ShopOrder::STATUS_NEW_ORDER);
                $shopOrder->setSessionId($sessionId);
                $em->persist($shopOrder);
                $em->flush();
                //session_regenerate_id
                $this->session->migrate();
            }

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'mainpage/order.html.twig',
            [
                'title' => 'Оформление заказа',
                'form' => $form->createView(),
            ]
        );
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
