<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{

    public static function checkAccessCookie($jwt = false)
    {
        $session_cookie = $jwt;

        if (!$session_cookie) {
            $cookie_name = config_item('cookie_prefix') . 'jwt_' . config_item('sess_cookie_name');
            $session_cookie = get_cookie($cookie_name);
        }

        if (!$session_cookie) {
            return false;
        }

        $decoded = self::decodeJWT($session_cookie);
        return $decoded ? $decoded->data->token : false;
    }

    public static function decodeJWT($jwt)
    {
        $url = APIPRIVATE_URL . "api_auth/decode_jwt";
        $data = array(
            'jwt' => $jwt,
        );

        return curlRequest($url, $data, "POST");
    }

    public static function logout()
    {
        $cookieName = 'jwt_' . config_item('sess_cookie_name');
        $session_cookie = config_item('cookie_prefix') . $cookieName;

        if (isset($session_cookie)) {
            session_destroy();
            delete_cookie($cookieName);
        }
    }
}
