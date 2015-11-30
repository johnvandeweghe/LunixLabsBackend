<?php
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);

require("vendor/autoload.php");

require("Endpoints/v1_0/projects.php");

$accessControl = new \LunixREST\AccessControl\PublicAccessControl("public");
$throttle = new \LunixREST\Throttle\NoThrottle();
$formatsConfig = new \LunixREST\Configuration\INIConfiguration("config/formats.ini");
$router = new \LunixREST\Router\Router($accessControl, $throttle, $formatsConfig, "LunixLabs");

try {
	$request = new \LunixREST\Request\Request($_SERVER['REQUEST_METHOD'], getallheaders(), $_REQUEST, $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI']);

	try {
		echo $router->handle($request);
	} catch(\LunixREST\Exceptions\InvalidRequestFormatException $e){
		header('400 Bad Request', 400);
	} catch(\LunixREST\Exceptions\UnknownEndpointException $e){
		header('404 Not Found', 404);
	} catch(\LunixREST\Exceptions\UnknownResponseFormatException $e){
		header('404 Not Found', 404);
	} catch(\LunixREST\Exceptions\AccessDeniedException $e){
		header('403 Access Denied', 403);
	}  catch(\LunixREST\Exceptions\ThrottleLimitExceededException $e){
		header('429 Too Many Requests', 429);
	} catch(\LunixREST\Exceptions\InvalidResponseFormatException $e){
		header('500 Internal Server Error', 500);
	} catch(Exception $e){
		header('500 Internal Server Error', 500);
	}
} catch(\LunixREST\Exceptions\InvalidRequestFormatException $e){
	header('400 Bad Request', 400);
} catch(Exception $e){
	header('500 Internal Server Error', 500);
}
