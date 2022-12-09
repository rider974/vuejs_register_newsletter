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
        // vérifier que l'input est bien renvoyer 
     
        $email = htmlspecialchars($_POST["email"]);
      // verify this is a valid email function php included
        $confirmEmail = validateEmail($email);
       if ($confirmEmail)
       {

        $suscriber = subscribe($email); 
        
        echo  json_encode($suscriber); 
       }
       else 
       // renvoyer un message d'erreur en json
       {
        echo json_encode(["message"=> "l'email n'est pas valide", "error"=>true]);
       }
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

/**
 * undocumented function summary
 *
 * Undocumented function long description
 *
 * @param Type $var Description
 * @return type
 * @throws conditon
 **/
 function validateEmail(string $email )
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
       return true;
   }
   else {
    return false;
   }
}