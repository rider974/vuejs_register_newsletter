<?php 
header('Access-Control-Allow-Origin: *');
require_once '../router/router.php';
// je clique sur valider dans le formulaire de connexion

// le JS envoi une requete vers une addresse http précise avec une méthode demandé GET/POST/PUT/ DELETE

// je suis dirigé vers le router qui mappe la requete SRVER URI http avec un controller User ou Modele et la méthode qui va avec getUser par exemple l'envoi de paramétres en POST ou GET se fait via l'url  

$data = "{error: do not pass the uri}";
$router = new Router($_SERVER["REQUEST_URI"]);

// how to  remove the additionnal path, controller and other dupplicate string ?
// in the function 
$router->addRoute("/register",  "RegisterController", "POST", ["function"=> "register"]);

$router->addRoute("/all",  "RegisterController", "POST", ["function"=> "all"]);

$router->addRoute("/subscription",  "SubscriptionPageController", "GET", ["function"=> "getSubscriptionPage"]);



$router->run();
