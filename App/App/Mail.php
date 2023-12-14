<?php
namespace App;

require '../vendor/autoload.php';
use Mailgun\Mailgun;
class Mail
{


    /**
     * Send a message
     *
     * @param string $to Recipient
     * @param string $subject Subject
     * @param string $text Text-only content of the message
     * @param string $html HTML content of the message
     *
     * @return mixed
     */
    public static function send($to, $subject, $text, $html)
    {
// First, instantiate the SDK with your API credentials
        $mg = Mailgun::create(Config::MAILGUN_API_KEY, 'https://api.mailgun.net');

        $mg->messages()->send(Config::MAILGUN_DOMAIN, ['from'    => 'burcu@sandbox6c9b5e054ffc4f19a04af5461a0e635e.mailgun.org',
            'to'      => $to,
            'subject' => $subject,
            'text'    => $text,
            'html'    => $html]);
    }
}