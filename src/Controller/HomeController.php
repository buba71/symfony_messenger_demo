<?php

namespace App\Controller;

use App\Message\SendNotification;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Twig\Environment;


class HomeController
{
    public function index(Environment $twig, MessageBusInterface $bus): Response
    {
        $bus->dispatch(new SendNotification('Hello World !', ['email_1@example.com', 'email_2@example.com' ]));

        return new Response($twig->render('home/index.html.twig'));

    }
}