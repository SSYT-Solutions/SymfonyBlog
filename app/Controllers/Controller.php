<?php
/**
  *
  *
*/

namespace App\Controllers;

abstract class Controller {
    protected $container;


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
