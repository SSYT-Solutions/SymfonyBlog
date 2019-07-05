<?php
  namespace App\Controllers;

  class HomeController extends Controller {
      public function index()
      {
          echo "home page";
          if($this->container->get('Guest')) {
              echo "Hello Guest";
          }
      }

      public function login()
      {
          
      }
  }
