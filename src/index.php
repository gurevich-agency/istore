<?php
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Laminas\Diactoros\Response\RedirectResponse;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');


/**Initialization */
$request = ServerRequestFactory::fromGlobals();


/**Process */
$app = App\App::create($request);
$response = !($request->getServerParams()['REQUEST_URI'] == '/edit/') ? new HtmlResponse($app->run($request)) : new JsonResponse($app->run($request));

/**Postprocessing */
// $response = $response->withHeader('Access-Control-Allow-Origin', '*');
// $response = $response->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

/**Sending */
$emitter = new SapiEmitter();
$emitter->emit($response);

?>