<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'mysql';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'mvclogin';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'secret';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    const SECRET_KEY = '3Hufc6aHsMR2R0HoqvVzomOczVHbwPYN';
    const MAILGUN_API_KEY = 'da8b98977e8e929aa24bd013d1b68cd9-0a688b4a-0622738a';

    /**
     * Mailgun domain
     *
     * @var string
     */
    const MAILGUN_DOMAIN = 'sandbox6c9b5e054ffc4f19a04af5461a0e635e.mailgun.org';
}
