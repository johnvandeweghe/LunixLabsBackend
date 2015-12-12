<?php
namespace LunixLabs\Request;

/**
 * Class Request
 * @package LunixLabs\Request
 */
class PublicRequest extends \LunixREST\Request\Request
{
    public static function createFromURL($method, array $headers, array $data, $ip, $url){
        $splitURL = explode('/', trim($url, '/'));

        if(count($splitURL) < 2){
            throw new \LunixREST\Exceptions\InvalidRequestFormatException();
        }
        $apiKey = "public";

        //Find endpoint
        $version = $splitURL[0];
        $endpoint = $splitURL[1];

        $splitExtension = explode('.', $splitURL[count($splitURL) - 1]);
        $extension = array_pop($splitExtension);

        if(count($splitURL) == 3){
            $instance = implode('.', $splitExtension);
        } else {
            $endpoint = implode('.', $splitExtension);
        }

        return new PublicRequest($method, $headers, $data, $ip, $version, $apiKey, $endpoint, $extension, $instance);
    }
}
