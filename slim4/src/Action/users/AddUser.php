<?php

namespace App\Action\Users;

use App\Domain\Banners\Banners;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddUser
{
  private $Users;
  public function __construct(Users $users)
  {
    $this->users = $users;
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
  ): ResponseInterface 
  {
     // $data = $request->getParsedBody();
    // $data =(array) json_decode($data);
    $data = array_merge($_POST, $_FILES);
    $users = $this->users->adduser($data);
    $response->getBody()->write((string)json_encode($users));
    return $response
          ->withHeader('Content-Type', 'application/json');
  }
}