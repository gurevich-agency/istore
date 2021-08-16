<?php
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

$html = '<h1>Im working</h1>';

$htmlResponse = new HtmlResponse($html);


/**Postprocessing */
// $response = $response->withHeader('Access-Control-Allow-Origin', '*');
// $response = $response->withHeader('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');


/**Sending */
$emitter = new SapiEmitter();
$emitter->emit($htmlResponse);

?>