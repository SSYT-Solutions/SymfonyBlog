<?php
    namespace App\Middleware;
    use App\Controllers\Controller as Controller;

    class Guest extends Controller {
        protected $container;

        public function Guest() {
            if($this->container->session->exists('user')) {
                return true;
            } else {
                return false;
            }
        }

        public function __invoke(Request $request, Response $response, $next) {
            echo "Init";
            $next;
        }
    }
