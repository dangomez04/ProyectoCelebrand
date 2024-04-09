<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('curlRequest')) {
    function curlRequest($url, $data = array(), $request_type = "POST", $json_decode = true)
    {
        $api_key = API_KEY;

        $options = array(
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: ' . $api_key,
                'Accept: application/json',
            ),
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "Revi", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 30,      // timeout on connect
            CURLOPT_TIMEOUT        => 30,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
        );
        switch ($request_type) {
            case "GET":
                break;
            case "POST":
                $options[CURLOPT_POST] = 1;
                $options[CURLOPT_POSTFIELDS] = http_build_query($data);
                break;
            case "PUT":
            case "PATCH":
            case "DELETE":
                $options[CURLOPT_CUSTOMREQUEST] = $request_type;
                $options[CURLOPT_POSTFIELDS] = http_build_query($data);
                break;
        }

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err     = curl_errno($ch);
        $errmsg  = curl_error($ch);
        $header  = curl_getinfo($ch);


        curl_close($ch);

        if ($json_decode) {
            return json_decode($content);
        } else {
            return $content;
        }
    }
}


if (!function_exists('multiRequest')) {
    function multiRequest($data, $options = array(), $timeout = 150)
    {
        // array of curl handles
        $curly = array();
        // data to be returned
        $result = array();

        // multi handle
        $mh = curl_multi_init();

        // loop through $data and create curl handles
        // then add them to the multi-handle
        foreach ($data as $id => $d) {

            print_r($d);
            echo "<br>";
            $curly[$id] = curl_init();

            $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;

            curl_setopt($curly[$id], CURLOPT_URL, $url);

            curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curly[$id], CURLOPT_HEADER, false);
            curl_setopt($curly[$id], CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curly[$id], CURLOPT_ENCODING, "");
            curl_setopt($curly[$id], CURLOPT_USERAGENT, "spider");
            curl_setopt($curly[$id], CURLOPT_AUTOREFERER, true);
            curl_setopt($curly[$id], CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($curly[$id], CURLOPT_TIMEOUT, $timeout);
            curl_setopt($curly[$id], CURLOPT_MAXREDIRS, 10);
            curl_setopt($curly[$id], CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curly[$id], CURLOPT_SSL_VERIFYHOST, false);

            // post?
            if (is_array($d)) {
                if (!empty($d['post'])) {
                    curl_setopt($curly[$id], CURLOPT_POST,       1);
                    curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
                }
            }

            // extra options?
            if (!empty($options)) {
                curl_setopt_array($curly[$id], $options);
            }

            curl_multi_add_handle($mh, $curly[$id]);
        }

        // execute the handles
        $running = null;
        do {
            curl_multi_exec($mh, $running);
        } while ($running > 0);


        // get content and remove handles
        foreach ($curly as $id => $c) {
            $result[$id] = curl_multi_getcontent($c);
            curl_multi_remove_handle($mh, $c);
        }

        // all done
        curl_multi_close($mh);

        return $result;
    }
}
