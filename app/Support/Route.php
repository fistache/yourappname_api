<?php

namespace App\Support;

use Laravel\Lumen\Routing\Router;

class Route
{
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function get(string $url): void
    {
        $controllerMethod = $this->computeControllerMethod($url);

        $this->router->get($url, $controllerMethod);
    }

    public function post(string $url): void
    {
        $controllerMethod = $this->computeControllerMethod($url);;

        $this->router->post($url, $controllerMethod);
    }

    /**
     * Compute a controller method name using $url.
     *
     * Example: $url = 'certificate.get' ->
     * -> certificate -> 'Certificate' + 'Controller' -> 'CertificateController' ->
     * -> 'CertificateController' + '.' + 'get' ->
     * -> 'CertificateController.get'
     *
     * @param string $url
     * @return null|string
     */
    private function computeControllerMethod(string $url): ?string
    {
        $controllerMethod = null;

        list($controller, $method) = explode(".", $url);

        if ($controller && $method) {
            $controller = ucfirst($controller);
            $controllerMethod = "${controller}Controller@${method}";
        }

        return $controllerMethod;
    }
}
