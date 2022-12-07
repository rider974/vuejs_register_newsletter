<?php

require_once "connexion.php";

function subscribe($email){
 
    require_once "connexion.php";


    $isRegister1 = isRegister($email);

    if (empty($isRegister1)){
        
    $sql = "INSERT INTO suscribers VALUES(null, :email)"; 
    $req= getBdd()->prepare($sql);

    $req->bindParam(":email", $email); 
    $req->execute();

    $isRegister2 =isRegister($email);
  

        if (!empty($isRegister2)){
            return "vous êtes bien inscrit à la newsletter";
        }

    }
    else {
        return "vous êtes déjà inscrit à cette newsletter";
    }

    
}

function isSuscribe($id_suscriber){
    $sql = "SELECT register FROM suscribers WHERE id_suscriber = :id";
    $req = getBdd()->prepare($sql);
    $req->bindParam(":id", $id_suscriber);
    $req->execute();

    $result = $req->fetch();

    if (!empty($result)){

        return $result;
    } 
    else {
        return false; 
    }
}
/**
 * verify the email in the database 
 *
 * Undocumented function long description
 *
 * @param Type $email string  
 * @return type string
 * @throws email
 **/

function isRegister($email){
    $sql1 = "SELECT email from suscribers WHERE  email = :email";
    $req1 = getBdd()->prepare($sql1);
    $req1->bindParam(":email", $email); 

    $req1->execute(); 

    $result1 = $req1->fetch();

    return $result1; 
}
function all(){
    
require_once "connexion.php";
    $sql1 = "SELECT * from suscribers ";
    $req1 = getBdd()->prepare($sql1);


    $req1->execute(); 

    $result1 = $req1->fetchAll();

    return $result1; 
}