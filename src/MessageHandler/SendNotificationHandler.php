<?php

namespace App\MessageHandler;

use App\Message\SendNotification;
use Swift_Mailer;

class SendNotificationHandler
{
    private $mailer;
    public function __construct(Swift_Mailer $mailer)
    {

        $this->mailer =$mailer;
    }
    public function __invoke(SendNotification $notification)
    {
        //sleep(10);

        foreach ($notification->getRecipients() as $recipient){

            $message = (new \Swift_Message('[Notification]'))
                ->setFrom('d.delima@example.com')
                ->setTo($recipient)
                ->setBody(
                    sprintf('<h1>Notification</h1><p>%s</p>', $notification->getMessage())
                    ,
                    'text/html'
                )

            ;

            $this->mailer->send($message);

            dump(sprintf('Envoi du message "%s" à [%s]', $notification->getMessage(), $recipient). '<br/>');
        }
    }
}