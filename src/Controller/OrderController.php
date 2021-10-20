<?php

namespace App\Controller;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="order")
     */


//    public function checkForm(Request $request)
//    {
//        // Decode data with json_decode()
//        $data = json_decode($request->getContent(), true);
//
//        return $this->json($data);
//    }

    public function createProductRoute(Request $request) : Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)

        //$data = json_decode($request->getContent(), true);

        // Decode data with json_decode()
        $data = json_decode($request->getContent(), true);

        $order = new Order();


        $order->setReciever($data['reciever']);
        $order->setMessage($data['message']);
        $order->setSender($data['sender']);
        $order->setMembership($data['membershipPackage']);
        $order->setSenderSelect($data['sendCardTo']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($order);
        $entityManager->flush();

        return new Response('Saved new product with id ' . $order->getId());



        // tell Doctrine you want to (eventually) save the Product (no queries yet)

        // actually executes the queries (i.e. the INSERT query)

    }
}