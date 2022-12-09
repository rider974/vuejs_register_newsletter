<?php 

   
require_once "../app/model/register.php";

class RegisterController{

/**
 * email is sent by POST then inserted in the database, a message of success or failure is sent back 
 *
 * @param none but string email is sent by POST 
 * @return Json array with string message, boolean error
 **/
function register()
{
    if (isset($_POST["email"]) && !empty($_POST["email"]) ){

        $email = htmlspecialchars($_POST["email"]);
        $suscriber = subscribe($email); 
        
        echo  json_encode($suscriber); 
    }
}
/**
 * send all the subscribers in the database 
 *
 * @return Json
 **/
function all(){
    
    require_once "../model/register.php";

   $all = json_encode(all());
return $all; 

}


/**
 * the user wants to delete its subscription so he enters his email address and an email is sent to his
 *
 * Undocumented function long description
 *
 * @param string $email Description
 * @return json Message which will be sent to your email address 
 **/

function deleteSubscription($email)
    {
        require_once "../model/register.php";

        if (isset($_POST["email"]) && !empty($_POST["email"])  && isset($_POST["confirmDelete"]))
            {
                $delete = deleteEmail(htmlspecialchars($_POST["email"]));
            }
    }
}

