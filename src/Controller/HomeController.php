<?php

namespace App\Controller;

use App\Message\SendNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Twig\Environment;


class HomeController
{
    public function index(Request $request, Environment $twig, MessageBusInterface $bus): Response
    {
        $message = $request->query->get('message', 'Hello worl!');
        $recipients =  ['email_1@example.com', 'email_2@example.com' ];

        $bus->dispatch(new SendNotification($message, $recipients));

        return new Response($twig->render('home/index.html.twig'));

    }
}