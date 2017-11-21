<?php 
use \Psr\Http\Message\ServerRequestInterface as Request; 
use \Psr\Http\Message\ResponseInterface as Response;
require '../vendor/autoload.php';
require 'EntregasDAO.php';

$app = new \Slim\App; 

$app->post('/api/entrega/{id}', function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
    $novaEntrega = json_decode($request->getBody(), true);

     $entregaDao = new EntregasDao();

     if($entregaDao.atualizaEntrega($id, novaEntrega)){
          $response->withStatus(200)->write($novaentrega);
        }
        else{
             $response->withStatus(400)->write("Não foi possivel atualizar a entrega");
        }

    return $response; });



    $app->delete('/api/entrega/{id}', function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
     $entregaDao = new EntregasDao();
    if($entregaDao.removeEntrega($id)){
          $response->withStatus(200)->write($novaentrega);
        }
        else{
             $response->withStatus(400)->write("Não foi possivel apagar a entrega");
        }
    return $response; });

    $app->run(); 
?>