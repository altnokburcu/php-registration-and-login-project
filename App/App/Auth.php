<?php

namespace App;

use App\Models\RememberedLogin;
use App\Models\User;

/**
 * Authentication
 *
 * PHP version 7.0
 */
class Auth
{
    public static function login($user, $remember_me)
    {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user->id;

        if ($remember_me) {


        User::rememberLogin($user->id);

        }
    }

    /**
     * Logout the user
     *
     * @return void
     */
    public static function logout()
    {
      // Unset all of the session variables
      $_SESSION = [];

      // Delete the session cookie
      if (ini_get('session.use_cookies')) {
          $params = session_get_cookie_params();

          setcookie(
              session_name(),
              '',
              time() - 42000,
              $params['path'],
              $params['domain'],
              $params['secure'],
              $params['httponly']
          );
      }

      // Finally destroy the session
      session_destroy();

      static::forgetLogin();
    }

    /**
     * Return indicator of whether a user is logged in or not
     *
     * @return boolean
     */
    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    /**
     * Remember the originally-requested page in the session
     *
     * @return void
     */
    public static function rememberRequestedPage()
    {
        $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
    }

    /**
     * Get the originally-requested page to return to after requiring login, or default to the homepage
     *
     * @return string
     */
    public static function getReturnToPage()
    {
        return isset($_SESSION['return_to']) ? $_SESSION['return_to'] : '/';
    }
    public static function getUser(){
        if(isset($_SESSION['user_id'])){
            return User::findById($_SESSION['user_id']);
        }
        else {

            return static::loginFromRememberCookie();

        }
    }
    protected static function loginFromRememberCookie()
    {
        $cookie = isset($_COOKIE['remember_me']) ? $_COOKIE['remember_me'] : false;

        if ($cookie) {

            $remembered_login = RememberedLogin::findByToken($cookie);

            if ($remembered_login && ! $remembered_login->hasExpired()) {

                $user = $remembered_login->getUser();

                static::login($user, false);

                return $user;
            }
        }
    }
    protected static function forgetLogin()
    {
        $cookie = isset($_COOKIE['remember_me']) ? $_COOKIE['remember_me'] : false;

        if ($cookie) {

            $remembered_login = RememberedLogin::findByToken($cookie);

            if ($remembered_login) {

                $remembered_login->delete();

            }

            setcookie('remember_me', '', time() - 3600);  // set to expire in the past
        }
    }


}
