<?php


require_once "vue/vue_insert_contact.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    
    $contactModel->saveContact($nom, $email, $message);

    
    header("Location: controleur/home.php");
    exit(); 
} else {
   
    require_once "principal/contact.php";
}
?>