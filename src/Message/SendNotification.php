<?php

namespace App\Message;

class SendNotification
{
    private $message;
    private $recipients;

    public function __construct(string $message, array $recipients)
    {
        $this->message = $message;
        $this->recipients = $recipients;
    }

    public function getMessage()
    {
        return $this->message;

    }

    public function getRecipients()
    {
        return $this->recipients;
    }

}