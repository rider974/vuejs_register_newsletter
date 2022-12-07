<?php 


require_once 'route.php';

class Router{


    private string $url;

    private Array $routes = [];
    
    

    public function __construct($url){
        $this->url = htmlspecialchars($url) ?? "404";
    }


    public function addRoute($path , $controller = "RegisterController", $method ='GET', $param=null){
        $newPath = "/vueJS-test" . $path;
        $function= $param["function"] ?? null;
        $this->routes[$method][] = new Route($newPath, $controller, $function);
    }

    public function getRoutes(){
        var_dump($this->routes);
    }

    public function run(){
   
        foreach($this->routes[$_SERVER["REQUEST_METHOD"]] as $oneRoute){
       
               if ($oneRoute->getPath() == $this->url){
                return $oneRoute->execute();
            
               }
        }
    }
}