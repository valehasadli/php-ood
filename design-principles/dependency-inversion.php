<?php

// BAD Practice - violated version

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
}

// BEST practise - without violated the principle

interface MailerInterface
{
    public function send(): void;
}

class WelcomeMessage implements MailerInterface
{
    public function send(): void
    {
        // TODO: send welcome email with own logic
        echo 'welcome message has been sended' . PHP_EOL;
    }
}

class SlackMessage implements MailerInterface
{
    public function send(): void
    {
        // TODO: send slack email with own logic
        echo 'slack message has been sended' . PHP_EOL;
    }
}

class SendMail
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    // useless dead
    public function send(): void
    {
        // add business logic then send
        $this->mailer->send();
    }
}

class SendMultipleMail
{
    private array $mailers;

    public function __construct(array $mailers)
    {
        $this->mailers = $mailers;
    }

    public function send(): void
    {
        foreach ($this->mailers as $mailer) {
            $mailer->send();
        }
    }
}

$mail = new SendMultipleMail([
    (new SlackMessage()),
    (new WelcomeMessage()),
]);

$mail->send();