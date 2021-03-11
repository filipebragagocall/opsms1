<?php


namespace App\PAMI;


use PAMI\Message\Action\ActionMessage;

class SMSCommand extends ActionMessage
{
    public function __construct($command)
    {
        parent::__construct("SMSCommand");
        $this->setKey("Command", $command);
    }
}
