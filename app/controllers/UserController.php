<?php

namespace app\controllers;

use core\attributes\Route;

class UserController
{
  #[Route('GET', '/users')]
  public function index()
  {
  }

  #[Route('GET', '/user/create')]
  public function create()
  {
  }

  #[Route('POST', '/user')]
  public function store()
  {
  }


  #[Route('PUT', '/user/{id}')]
  public function update()
  {
  }

  #[Route('DELETE', '/user/{id}')]
  public function destroy()
  {
  }
}
