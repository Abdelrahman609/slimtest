<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name:[a-z]+}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->post('/test/demo', function(Request $req, Response $res){

    $data = $req->getParsedBody();
    $inputdata= [];
    $inputdata['name'] = $data['name'];
    $inputdata['phone'] = $data['phone'];
    
    $res->getBody()->write('data'.$inputdata['name'] . $inputdata['phone']);
});

$app->get('/jsontest/{first}/{last}', function($req, $res, $args){

    $firstname = $args['first'];
    $lastname = $args['last'];
    $out = [];
    $out['status'] = 200;
    $out['message'] = 'done';
    $out['first'] = $firstname;
    $out['last'] = $lastname;

    $res->getBody()->write(json_encode($out));

});
$app->run();