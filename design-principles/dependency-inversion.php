<?php

// bad practice - violated version

class Mailer
{
    public function send(): void
    {
        // todo
    }
}

class SendWelcomeMessage
{
    private Mailer $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    // useless code
    public function instance(): Mailer
    {
        return $this->mailer;
    }
}

// GOOD version without violated the principle

interface MailerInterface
{
    public function send(): void;
}

interface ValidateInterface
{
    public function validate(): bool;
}

class WelcomeMessage implements MailerInterface
{
    public function send(): void
    {
        // TODO: send welcome email with own logic
        echo 'welcome message has been sended';
    }
}

class SlackMessage implements MailerInterface
{
    public function send(): void
    {
        // TODO: send slack email with own logic
        echo 'slack message has been sended';
    }
}

class SendMail implements ValidateInterface
{
    // mock data
    private bool $vip = true;

    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function validate(): bool
    {
        return $this->vip;
    }

    // useless dead
    public function validateAndSend(): void
    {
        if ($this->validate()) {
            $this->mailer->send();
        }
    }
}

class SendMultipleMail implements ValidateInterface
{
    private array $mailers;

    public function __construct(array $mailers)
    {
        $this->mailers = $mailers;
    }

    // mock
    private bool $vip = true;

    public function validate(): bool
    {
        return $this->vip;
    }


    public function validateAndSend(): void
    {
        if ($this->validate()) {
            /** @var MailerInterface $mailer */
           foreach ($this->mailers as $mailer) {
               $mailer->send();
           }
        }
    }
}

$mail = new SendMultipleMail([
    (new SlackMessage()),
    (new WelcomeMessage()),
]);

$mail->validateAndSend();