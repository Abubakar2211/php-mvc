<?php
class Route
{
    public $routes;

    public function router($url, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === $method){
                
                require $route['controller'];
                return;
            }
        }
        abort();
    }



    public function get(string $url, string $controller)
    {
        $this->addRoute("GET", $url, $controller);
    }
    public function post(string $url, string $controller)
    {
        $this->addRoute("POST", $url, $controller);
    }
    public function put(string $url, string $controller)
    {
        $this->addRoute("PUT", $url, $controller);
    }

    public function delete(string $url, string $controller)
    {
        $this->addRoute("DELETE", $url, $controller);
    }

    public function addRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'url' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }
}
?>