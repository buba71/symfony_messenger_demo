<?php

namespace App\MessageHandler;

use App\Message\SendNotification;

class SendNotificationHandler
{
    public function __invoke(SendNotification $notification)
    {
        foreach ($notification->getRecipients() as $recipient){
            echo sprintf('Envoi du message "%s" à [%s]', $notification->getMessage(), $recipient). '<br/>';
        }
    }
}