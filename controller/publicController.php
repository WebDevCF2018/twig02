<?php

// name of our namspace
namespace Controller;

// use nosModels
use Models\nosModels AS DT;

// class for publicController
class publicController{

    // method for "acceuil"
    public static function welcomeAction($twig){
        // recup datas from model
        $datas = DT::accueilDatas();
        // view accueil with $datas in an associative array, with key "recup"
        echo $twig->render("accueil.html.twig",["recup"=>$datas]);
    }

    // method for "contact"
    public static function contactAction($twig){
        // pas de formulaire envoyé
        if(!empty($_POST)){

        // affichage du formulaire
        }else {
            // recup form
            $datas = DT::formDatas();
            echo $twig->render("form.html.twig", ["recup" => $datas]);
        }
    }

}