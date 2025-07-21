<?php
class Route
{
    public $routes;

    public function get(string $url, string $controller)
    {
        return $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => "GET"
        ];
    }
    public function post(string $url, string $controller)
    {
        return $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => "POST"
        ];
    }
    public function put(string $url, string $controller, string $parameter)
    {
        return $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'parameter' => $parameter,
            'method' => "PUT"
        ];
    }

    public function delete(string $url, string $controller, string $parameter)
    {
        return $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'parameter' => $parameter,
            'method' => 'DELETE',
        ];
    }


}
?>