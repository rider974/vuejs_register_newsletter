<?php 

function getBdd(){

    $bdd = new PDO("mysql:host=localhost;dbname=register_newsletter", "root", null);

    return $bdd; 
}