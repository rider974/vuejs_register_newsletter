<?php 


class RegisterController{

function register()
{
    if (isset($_POST["email"]) && !empty($_POST["email"]) ){

    require_once "../app/model/register.php";
        $email = htmlspecialchars($_POST["email"]);
        $suscriber = subscribe($email); 
        
        echo json_encode($suscriber); 
    }
}

function all(){
    
    require_once "../model/register.php";

   $all = json_encode(all());
return $all; 

}
}

