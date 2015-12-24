<?php
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);

require("vendor/autoload.php");

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/src/Entities");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'lunixlabs',
    'password' => 'supercool',
    'dbname'   => 'lunixlabs',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$accessControl = new \LunixREST\AccessControl\PublicAccessControl("public");
$throttle = new \LunixREST\Throttle\NoThrottle();
$formatsConfig = new \LunixREST\Configuration\INIConfiguration("config/formats.ini");
$router = new \LunixREST\Router\DoctrineRouter($accessControl, $throttle, $formatsConfig, "LunixLabs", $entityManager);

try {
	$request = \LunixLabs\Request\PublicRequest::createFromURL($_SERVER['REQUEST_METHOD'], getallheaders(), $_REQUEST, $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI']);

	try {
        echo $router->handle($request);
    } catch(\LunixREST\Exceptions\InvalidAPIKeyException $e){
        header('400 Bad Request', true, 400);
    } catch(\LunixREST\Exceptions\UnknownEndpointException $e){
		header('404 Not Found', true, 404);
	} catch(\LunixREST\Exceptions\UnknownResponseFormatException $e){
		header('404 Not Found', true, 404);
	} catch(\LunixREST\Exceptions\AccessDeniedException $e){
		header('403 Access Denied', true, 403);
	}  catch(\LunixREST\Exceptions\ThrottleLimitExceededException $e){
		header('429 Too Many Requests', true, 429);
	} catch(\LunixREST\Exceptions\InvalidResponseFormatException $e){
		header('500 Internal Server Error', true, 500);
	} catch(\Exception $e){
		header('500 Internal Server Error', true, 500);
	}
} catch(\LunixREST\Exceptions\InvalidRequestFormatException $e){
	header('400 Bad Request', true, 400);
} catch(\Exception $e){
	header('500 Internal Server Error', true, 500);
}
