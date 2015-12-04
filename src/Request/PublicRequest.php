<?php
namespace LunixLabs\Request;

/**
 * Class Request
 * @package LunixLabs\Request
 */
class PublicRequest extends \LunixREST\Request\Request
{
    public static function createFromURL($url){
        $splitURL = explode('/', trim($url, '/'));
        var_dump($splitURL);
        if(count($splitURL) < 2){
            throw new \LunixREST\Exceptions\InvalidRequestFormatException();
        }
        $this->apiKey = "public";

        //Find endpoint
        $this->version = $splitURL[0];
        $this->endpoint = $splitURL[1];

        $splitExtension = explode('.', $splitURL[count($splitURL) - 1]);
        $this->extension = array_pop($splitExtension);

        if(count($splitURL) == 3){
            $this->instance = implode('.', $splitExtension);
        } else {
            $this->endpoint = implode('.', $splitExtension);
        }
    }
}
