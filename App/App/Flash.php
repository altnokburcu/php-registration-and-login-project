<?php

namespace App;

class Flash
{
    /**
     * Success message type
     * @var string
     */
    const SUCCESS = 'success';

    /**
     * Information message type
     * @var string
     */
    const INFO = 'info';

    /**
     * Warning message type
     * @var string
     */
    const WARNING = 'warning';


    /**
     * Add a message
     *
     * @param string $message  The message content
     *
     * @return void
     */
    public static function addMessage($message, $type = 'success')
    {
        // Create array in the session if it doesn't already exist
        if (! isset($_SESSION['flash_notifications'])) {
            $_SESSION['flash_notifications'] = [];
        }

        // Append the message to the array
        $_SESSION['flash_notifications'][] =   ['body' => $message,
            'type' => $type];
    }

    public static function getMessages()
    {
        if (isset($_SESSION['flash_notifications'])) {
            $message = $_SESSION['flash_notifications'];

                foreach ($message as $msg) {
                    $body = htmlspecialchars($msg['body'], ENT_QUOTES, 'UTF-8');
                    $type = htmlspecialchars($msg['type'], ENT_QUOTES, 'UTF-8');

                    echo '<div class="alert alert-' . $type . '">' . $body . '</div>';
                }
            unset($_SESSION['flash_notifications']);

        }
    }
}